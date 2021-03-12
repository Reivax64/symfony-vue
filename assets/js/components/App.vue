<template>
  <div class="container">
    <modal id="modalCreateCours" title="Créer un cours" :submit="submitForm" ok="Créer un cours">
        <div class="mb-5">
            <div class="form-group">
                <label>Matière</label>
                <select class="form-control" v-model="coursFormData.matiere" required>
                    <option v-for="matiere in matieres" :key="matiere.id" :value="matiere.id">
                        [{{ matiere.reference }}] {{ matiere.titre }}
                    </option>
                </select>

                <label>Type</label>                                    
                <select class="form-control" v-model="coursFormData.type" required>
                    <option>TP</option>
                    <option>TD</option>
                    <option>Cours</option>
                </select>

                <div class="form-group row">
                    <div class="col-12 col-md-6">
                        <label>Début</label>
                        <input class="form-control" type="datetime-local" v-model="coursFormData.dateHeureDebut" id="example-datetime-local-input">
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Fin</label>
                        <input class="form-control" type="datetime-local" v-model="coursFormData.dateHeureFin" id="example-datetime-local-input">
                    </div>
                </div>

                <label>Salle</label>                                    
                <select class="form-control" v-model="coursFormData.salle" required>
                    <option v-for="salle in salles" :key="salle.id" :value="salle.id">
                        {{ salle.numero }}
                    </option>
                </select>

                <label>Professeur</label>                                    
                <select class="form-control" v-model="coursFormData.professeur" required>
                    <option v-for="professeur in professeurs" :key="professeur.id" :value="professeur.id">
                        {{ professeur | fullName }}
                    </option>
                </select>

                <label>Classe</label>                                
                <select class="form-control" v-model="coursFormData.classe" :disabled="currentClasse.id !== 'all'">
                    <template v-for="classe in classes">
                        {{classe.id === currentClasse.id}}
                        <option 
                            v-if="classe.id !== 'all'" :key="classe.id" 
                            :selected="classe.id === currentClasse.id" :value="classe.id"
                        >
                            {{ classe.nom }}
                        </option>
                    </template>
                </select>
            </div>
        </div>
        <v-alert v-show="errors.length" dismissible color="bg-danger" icon="mdi-alert-circle-outline" class="text-white" border="left" transition="scale-transition">
            <div class="ml-3">
                <p>Vous avez commis des erreurs !!</p>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>
        </v-alert>
        <v-alert v-show="success" dismissible color="bg-success" icon="mdi-check-circle-outline" class="text-white" border="left" transition="scale-transition">
            <p class="ml-3">{{ success }}</p>
        </v-alert>
    </modal>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand">Calendrier</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/cours.html">
                        Calendrier <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/edt.html">Note</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Classes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <button 
                            v-for="classe in classes" :key="classe.id" 
                            @click="currentClasse = classe" 
                            class="dropdown-item" type="button"
                        >{{classe.nom}}</button>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <h2 class="mb-5">{{ className }}</h2>

    <div class="row fill-height">
        <div class="col">                    
            <div class="d-flex">
                <v-btn outlined class="mr-4" color="grey darken-2" @click="setToday">
                    Aujourd'hui
                </v-btn>
                <v-btn fab text small color="grey darken-2" @click="prev">
                    <v-icon small>mdi-chevron-left</v-icon>
                </v-btn>
                <v-btn fab text small color="grey darken-2" @click="next">
                    <v-icon small>mdi-chevron-right</v-icon>
                </v-btn>
                <v-toolbar-title v-if="$refs.calendar">
                    {{ $refs.calendar.title }}
                </v-toolbar-title>

                <div class="ml-auto btn-group">
                    <v-btn class="bg-secondary text-white mr-3" elevation="10" x-small icon fab data-toggle="modal" data-target="#modalCreateCours" @click.once="getDataToAddCours">
                        <v-icon>mdi-plus</v-icon>
                    </v-btn>
                    <v-btn 
                        outlined color="grey darken-2" 
                        @click="typeSelected = typeSelected.key === 'day' ? typeSelected = types[1] : typeSelected= types[0]"
                    >
                        <span>{{ typeSelected.name }}</span>
                    </v-btn>
                </div>
            </div>
            
            <v-calendar
                ref="calendar"
                locale="fr"
                :hide-header="false"
                :interval-width="40"
                :short-weekdays="false"
                v-model="focus"
                :events="events"
                color="bg-primary"
                event-overlap-mode="column"
                :type="typeSelected.key"
                :interval-minutes="60" 
                :first-interval="7"
                :interval-count="12"
                @click:date="viewDay"
                @change="updateRange"
            >
                <template v-slot:event="{ event }">
                    <div
                        :class="{'ml-md-3 mt-md-1': typeSelected.key === 'day'}"
                        :style="{backgroundColor: event.color, color: colorAboutBG(event.color), height: '100%'}"
                        data-toggle="modal" :data-target="'#cours-'+event.id"
                    >
                        {{ event.properties.matiere.titre }}<br />
                        <div>{{ event.properties.type }} avec {{ event.properties.professeur | fullName }}</div>
                        <div><i>{{ event.properties.dateHeureDebut | getTime }} - {{ event.properties.dateHeureFin | getTime }} | {{ event.properties.salle.numero }}</i></div>
                    </div>
                </template>
            </v-calendar>

            <modal 
                v-for="cours in events" :key="cours.id" 
                :id="'cours-'+cours.id"
                size="lg"
                modal-header-class="p-0"
                cancel="Retour"
                :ok="false"
            >
                <template slot="modal-header">
                    <v-toolbar :color="cours.color" :style="{color: colorAboutBG(cours.color)}" dark>
                        <v-toolbar-title v-html="setViewCoursModalTitle(cours.properties)"></v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </v-btn>
                    </v-toolbar>
                </template>
                <v-card
                    color="grey lighten-4"
                    min-width="350px"
                    flat
                >
                    <v-card-text><span v-html="setViewCoursModalDetails(cours.properties)"></span></v-card-text>
                </v-card>
            </modal>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "app",

    data() {
        return {
            focus: "",
            currentClasse: { id: "all", nom: "Toutes les classes" },
            classes: [
                { id: "all", nom: "Toutes les classes" },
                { id: 1, nom: "LP PROG" },
                { id: 2, nom: "Littéraire" },
            ],
            salles: [],
            professeurs: [],
            typeSelected: { key: "day", name: "Jour" },
            types: [
                { key: "day", name: "Jour" },
                { key: "week", name: "Semaine" },
            ],
            matieres: [
                { id: 1, titre: "Web Avancé", reference: "WA" },
                { id: 2, titre: "Philosophie", reference: "PH" },
            ],
            coursFormData: {
                dateHeureDebut: undefined,
                dateHeureFin: undefined,
                type: undefined,
                couleur:"#FFAAFF",
                salle: undefined,
                professeur: undefined,
                matiere: undefined,
                classe: undefined,
            },
            errors: [],
            success: null,
            alert: true,
            selectedEvent: {},
            selectedElement: null,
            selectedOpen: false,
            events: [],
        }
    },

    mounted() {
        this.$refs.calendar.checkChange()
    },
    computed: {
        className() {
            return this.currentClasse.id === "all"
                ? this.currentClasse.nom
                : "Classe de " + this.currentClasse.nom
        }
    },
    methods: {
        getCours(paramDates) {
            let paramClasse = this.currentClasse.id !== 'all'
                ? '/classe/' + this.currentClasse.id
                : ''
            let urlParam = paramClasse + paramDates

            axios.get(`/api/cours${urlParam}`)
            .then(response => {
                let cours = response.data
                let events = []

                cours.forEach(element => {                             
                    events.push(this.factorizeCoursToCalendar(element))
                })
                this.events = events
            })
            .catch(error => {
                console.error(error)
            })
        },
        factorizeCoursToCalendar(cours) {
            return {
                id: cours.id,
                start: this.convertDateToCalendar(cours.dateHeureDebut),
                end: this.convertDateToCalendar(cours.dateHeureFin),
                color: cours.couleur || "gray",
                timed: true,
                properties: cours,
            }
        },
        getSalles() {
            axios.get("/api/salles")
            .then(response => {
                this.salles = response.data
            })
            .catch(error => {
                console.error(error)
            })
        },
        getProfesseurs() {
            axios.get("/api/professeurs")
            .then(response => {
                this.professeurs = response.data
            })
            .catch(error => {
                console.error(error)
            })
        },
        getDataToAddCours() {
            this.getSalles()
            this.getProfesseurs()
        },

        submitForm(evt) {    
            this.errors = []     
            this.success = null

            if (!this.coursFormData.type) this.errors.push("Le type de cours est requis")
            if (!this.coursFormData.salle) this.errors.push("La salle de cours est requise")
            if (!this.coursFormData.professeur) this.errors.push("Le professeur est requis")
            if (!this.coursFormData.matiere) this.errors.push("La matière est requise")
            if (!this.coursFormData.classe) this.errors.push("La classe est requise")

            if (!this.errors.length) this.postCours()
        },

        postCours() {
            let formData = { ...this.coursFormData }
            formData.dateHeureDebut = this.convertDateToBDD(formData.dateHeureDebut)
            formData.dateHeureFin = this.convertDateToBDD(formData.dateHeureFin)

            axios.post("/api/cours", formData)
            .then(response => {
                this.events.push(this.factorizeCoursToCalendar(response.data))
                console.log(this.success)
                this.success = `Le cours de ${response.data.matiere.titre} a été créé avec succès!`
                console.log(this.success)
            })
            .catch(error => {
                if (error.response && error.response.data instanceof Object) {
                    this.errors = Object.values(error.response.data)
                }                            
            })
        },

        convertDateToBDD(date) {
            let arrayDate = date.split("T")
            let day = arrayDate[0]
            let time = arrayDate[1]
            
            day = day.split("-").reverse().join("-")
            time += ":00"
            let result = day + " " + time
            
            return result
        },

        convertDateToCalendar(date) {
            if (!date) {
                console.error("convertDateToCalendar() doit recevoir en paramètre un string, il obtient " + typeof date)
                return ""
            }

            let arrayDate = date.split(" ")
            let day = arrayDate[0]
            let time = arrayDate[1]
            time = time ? " " + time : ""

            day = day.split("-").reverse().join("-")
            return day + time
        },
        setViewCoursModalTitle(cours) {
            return `<strong>[${cours.matiere.reference}]</strong> ${cours.matiere.titre} - ${cours.type}`
        },
        setViewCoursModalDetails(cours) {
            const day = cours.dateHeureDebut.split(' ')[0].split('-').join('/')
            return `
                <div class="row">
                    <div class="col-md-4"><strong>Professeur:</strong></div>
                    <div class="col-md-8">${this.$options.filters.fullName(cours.professeur)}</div>
                    <div class="col-md-4"><strong>Date:</strong></div>
                    <div class="col-md-8">Le ${day}, de ${this.$options.filters.getTime(cours.dateHeureDebut)} à ${this.$options.filters.getTime(cours.dateHeureFin)}</div>
                    <div class="col-md-4"><strong>Salle:</strong></div>
                    <div class="col-md-8">${cours.salle.numero}</div>
                </div>
            `
        },

        // Vuetify
        viewDay ({ date }) {
            this.focus = date
            this.typeSelected = { key: "day", name: "Jour" }
        },
        setToday () {
            this.focus = ''
        },
        prev () {
            this.$refs.calendar.prev()
        },
        next () {
            this.$refs.calendar.next()
        },
        updateRange ({ start, end }) {
            let dateStartFR = this.convertDateToCalendar(start.date)
            let dateEndFR = this.convertDateToCalendar(end.date)
            let urlParam = `/between/${dateStartFR}/${dateEndFR}`

            this.getCours(urlParam)
        },
        isLight(color) {
            // Variables for red, green, blue values
            var r, g, b, hsp;

            // Check the format of the color, HEX or RGB?
            if (color.match(/^rgb/)) {
                // If RGB --> store the red, green, blue values in separate variables
                color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
                
                r = color[1];
                g = color[2];
                b = color[3];
            } 
            else {                            
                // If hex --> Convert it to RGB: http://gist.github.com/983661
                color = +("0x" + color.slice(1).replace( 
                color.length < 5 && /./g, '$&$&'));

                r = color >> 16
                g = color >> 8 & 255
                b = color & 255
            }

            // HSP (Highly Sensitive Poo) equation from http://alienryderflex.com/hsp.html
            hsp = Math.sqrt(
                0.299 * (r * r) +
                0.587 * (g * g) +
                0.114 * (b * b)
            )

            // Using the HSP value, determine whether the color is light or dark
            return hsp<127.5
        },
        colorAboutBG(bg) {
            return bg 
                ? (this.isLight(bg) ? "#fff" : "#111")
                : undefined
        }
    },

    watch: {
        currentClasse() {
            this.coursFormData.classe = this.currentClasse.id
            let date = {
                start:  this.$refs.calendar.lastStart,
                end:    this.$refs.calendar.lastEnd
            }
            this.updateRange(date)
        },
    }
};
</script>

<style>

</style>