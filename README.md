
# Interface VueJS

Allez sur /cours.html

## Plugins

Dans le ```<header>```, On place Tous les cdn dont on a besoin.
Bien evidemment, Il faut mettre celui de Vue. 
Pour le css, nous utilisons Bootstrap.
Pour l'implémentation d'un calendrier, nous avons choisi ```v-calendar``` de Vuetify, car il est esthétique, très personnalisable et assez facilement. Vuetify adopte le Material Design, c'est pourquoi il est préférable de prendre des icons respectant ce design. A savoir, ```mdi``` pour Material Design Icon.
On surcharge le tout bien évidemment par notre propre css ```custom.css```
Axios est également nécessaire pour les requêtes AJAX, et JQUERY est une dépendance de Bootstrap


## Initialisation

Le code JS permet de charger Vue à l'intérieur de l'id 'app', en y intégrand Vuetify.

```HTML
<div id="app"></div>
```

```JS
var app = new Vue({
    el:"#App",
    vuetify: new Vuetify({
        lang: { current: 'fr' },
    }),
})
```

Les filters sont très utiles pour afficher du texte dépendant d'une variable.
On décide de les charger en global car ils sont potentiellement utiles partout dans l'application.

```HTML
<div> {{ professeur | fullName }}
```

```JS
this.$options.filters.fullName(professeur)
```

```JS
Vue.filter('fullName', function (character) {
    let fullNameArray = []
    if (character.prenom) fullNameArray.push(character.prenom)
    if (character.nom) fullNameArray.push(character.nom)
    return fullNameArray.join(" ")
})
```

Les components font la force de Vue. Je décide de mettre le component ```<modal />``` en global pour la même raison que les filters.

```HTML
<modal :id="id" title="Un titre"> ... </modal>
```

```JS
Vue.component('modal', {
    props: {
        id:     { type: String, default: 'modal-id' },
        size:   { type: String },
        title:  { type: String },
        ok:     { type: [String, Boolean], default: "Valider" },
        cancel: { type: [String, Boolean], default: "Annuler" },
        submit: { type: Function },
        modalHeaderClass: { type: String },
    },
    template: '<div> ... </div>'
})
```

Les ```data``` sont réactives : leur modification crée des événements, qui sont écoutables afin de lancer d'autres actions. Ceci est possible grâce au bind des valeurs. On peut également leur appliquer des ```watch``` afin de lancer une fonction si celui-ci détecte un changement.
Dans cet exemple, la data du même nom est écoutée, exécutant la fonction à chaque changement.

```JS
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
```

Au chargement des données, on exécute des fonctions :

```JS
mounted() {
    this.getClasses()
    this.$refs.calendar.checkChange()
},
```

Cette deuxième fonctions permet d'accéder au cour d'un noeud du DOM, et par conséquend d'avoir accès à beaucoup de méthodes du component v-calendar

```HTML
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
```

Le @ est un alias de v-on, il permet d'écouter un évent qui répond au nom suivant. Cela permet donc d'exécuter une action en fonction d'une autre. Pour cet exemple, un changement de date exécutera la fonction updateRange().

```JS
updateRange ({ start, end }) {
    let dateStartFR = this.convertDateToCalendar(start.date)
    let dateEndFR = this.convertDateToCalendar(end.date)
    let urlParam = `/between/${dateStartFR}/${dateEndFR}`

    this.getCours(urlParam)
},
```

Bien qu'aucun argument n'ait  était passé, elle reçoit tout de même des infos du calendrier, notamment 'start' et 'end'.
Après quelques transformations, Nous appelons getCours(), et nous chargeons le calendar des données recues.

Nous pouvons également créer un cours. Après les étapes décrites plus haut dans la partie Symfony, Vous pouvez cliquer sur le + en haut à droite du calendrier. La modal de création apparait alors.

```HTML
<v-btn class="bg-secondary text-white mr-3" elevation="10" x-small icon fab data-toggle="modal" data-target="#modalCreateCours" @click.once="getDataToAddCours">
    <v-icon>mdi-plus</v-icon>
</v-btn>
```

Le terme ".once" permet d'exécuter qu'une seule fois l'action suivante. Cela permet d'éviter de faire des requetes API inutiles.


Nous informons l'utilisateur des erreurs qu'il commet lors de sa création de cours via texte sous le formulaire. Ce message est généré par ce code :

```JS
submitForm() {    
    this.errors = []     
    this.success = null

    if (!this.coursFormData.type) this.errors.push("Le type de cours est requis")
    if (!this.coursFormData.salle) this.errors.push("La salle de cours est requise")
    if (!this.coursFormData.professeur) this.errors.push("Le professeur est requis")
    if (!this.coursFormData.matiere) this.errors.push("La matière est requise")
    if (!this.coursFormData.classe) this.errors.push("La classe est requise")

    if (!this.errors.length) this.postCours()
},
```

Si l'api renvoie des erreurs, alors de la meme facon, le tableau array en sera agrandi.
Egalement, si la création s'effectue, un message, via la data 'success', viendra l'en informé.
Dans ce cas, le cours est automatiquement ajouté au calendrier