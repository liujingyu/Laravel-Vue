import VueI18n from 'vue-i18n';

Vue.use(VueI18n);

// Ready translated locale messages
const messages = {
    en: {
        message: {
            hello: 'hello world'
        }
    },
    ja: {
        message: {
            hello: 'こんにちは、世界'
        }
    }
};

// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: 'ja', // set locale
    messages, // set locale messages
});

export default i18n
