import './core';

var menu = new Vue({
    el: '#app-menus',
    data: {
        expand: storage.get('menu-expand', true)
    },
    watch: {
        expand(expand) {
            storage.set('menu-expand', expand === true);
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
