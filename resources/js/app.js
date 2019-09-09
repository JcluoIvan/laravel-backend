require('./bootstrap');
const app = new Vue({
    computed: {
        name() {
            return document
                .querySelector('meta[name=app-name]')
                .getAttribute('content');
        }
    },
    methods: {
        setCache(name, value) {
            localStorage.setItem(
                `${this.name}-${name}`,
                JSON.stringify({ value })
            );
        },
        getCache(name, def = null) {
            const v = localStorage.getItem(`${this.name}-${name}`);
            return v ? JSON.parse(v).value : def;
        }
    }
});

export default app;
