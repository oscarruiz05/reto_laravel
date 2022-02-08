const Home = () => import('./components/Home.vue')
const Mostrar = () => import('./components/automovil/Mostrar.vue')
const Crear = () => import('./components/automovil/Crear.vue')
const Editar = () => import('./components/automovil/Editar.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Mostrar
    },
    // {
    //     name: 'mostrasAutomoviles',
    //     path: '/automoviles',
    //     component: Mostrar
    // },
    {
        name: 'crearAutomovil',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarAutomovil',
        path: '/editar/:id',
        component: Editar
    }
]
