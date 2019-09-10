const app = new Vue({
    computed: {
        name() {
            const metaAppName = document.querySelector('meta[name=app-name]');
            return (
                (metaAppName && metaAppName.getAttribute('content')) ||
                'app-name'
            );
        },
        title() {
            const elTitle = document.querySelector('title');
            return (elTitle && elTitle.getAttribute('content')) || 'title';
        }
    }
});

export default app;
