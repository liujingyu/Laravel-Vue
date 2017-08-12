
import  './bootstrap';

import router from './routes';

import './components';

import i18n from './message';

const app = new Vue({
    el: '#app',
    router,
    i18n
});
