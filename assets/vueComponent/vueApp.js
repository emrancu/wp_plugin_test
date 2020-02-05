
const dashboard = Vue.component('vueComponent', {
    data: {
        name: {"id": 2, "name": "React JS"},
        options: [
            {id: 1, name: "Vue JS"},
            {id: 2, name: "React JS"},
            {id: 3, name: "Angular JS"},
        ]
    },
    methods: {
        customLabel(item) {
            return `${item.id} : ${item.name}`
        }
    },
    template: ` <h2> Template</h2>`,
});


const router = new VueRouter({
    scrollBehavior (to, from, savedPosition) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                resolve({ x: 0, y: 0 })
            }, 1500)
        })
    },
    routes: [
        {
            name: 'Dashboard',
            path: '/Dashboard',
            component: dashboard,
            meta: { depth: 1 }
        }
    ]
});

new Vue({
    el: '#vueApp',
    router,
    data: {
        name: { "id": 2, "name": "React JS" },
        options: [
            {id: 1, name: "Vue JS"},
            {id: 2, name: "React JS"},
            {id: 3, name: "Angular JS"},
        ]
    },
    methods:{
        customLabel (item) {
            return `${item.id} : ${item.name}`
        }
    }
});

