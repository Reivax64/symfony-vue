/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Vue from 'vue';
// import VueRouter from 'vue-router';
import vuetify from './plugins/vuetify' ;

import App from './js/components/App';
// import router from './js/router/index';
import './styles/app.css';
import Modal from './js/components/Modal'

// Vue.use(VueRouter);

Vue.filter('fullName', function (character) {
    if (!(character instanceof Object)) { 
        console.error("Le filtre fullName() doit s'appliquer sur un Object, et non sur : " + typeof date)
        return ""
    }

    let fullNameArray = []
    if (character.prenom) fullNameArray.push(character.prenom)
    if (character.nom) fullNameArray.push(character.nom)

    return fullNameArray.join(" ")
})

Vue.filter('getTime', function (date) {
    if ((typeof date !== 'string')) { 
        console.error("Le filtre getTime() doit s'appliquer sur un String, et non sur " + typeof date)
        return '' 
    }

    let timeArray = date.split(' ')[1].split(':')
    let minute = timeArray[1] !== '00' ? timeArray[1] : ''
    let time = timeArray[0] + 'h' + minute

    return time
})

Vue.component('modal', Modal)

new Vue({
    el: '#app',    
    // router,
    vuetify,
    render: h => h(App),
});