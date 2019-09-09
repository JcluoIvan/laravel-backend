require('./bootstrap');
import app from './app';

var menu = new Vue({
    el: '#app-menus',
    data: {
        expand: app.getCache('menu-expand', true)
    },
    watch: {
        expand(bool) {
            app.setCache('menu-expand', bool === true);
        }
    }
});

var header = new Vue({
    el: '#app-header',
    data: {},
    computed: {
        expand() {
            return menu.expand;
        }
    },
    methods: {
        onExpand() {
            menu.expand = true;
        },
        onCollapse() {
            menu.expand = false;
        }
    }
});
