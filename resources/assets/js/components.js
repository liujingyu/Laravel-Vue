import Modal from './components/Modal.vue';
import CreateNote from './components/CreateNote.vue';
import Login from './components/Login.vue';
import Alert from './components/Alert.vue';

Vue.component('modal', Modal);
Vue.component('create-note', CreateNote);
Vue.component('login', Login);
Vue.component('alert', Alert);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
)
