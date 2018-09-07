new Loader({
    selector: '#app',
    routs: [
        {
            path: '/home', view: 'src/views/home.html',
        },
        {
            path: '/about/{id}/{name}/{job}', view: 'src/views/about.html',
        },
        {
            path: '/list', view: 'src/views/list.html',
        },

    ]
});