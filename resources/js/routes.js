const Product = () => import('./components/Product.vue');
const Index = () => import('./components/products/Index.vue');
const Create = () => import('./components/products/Create.vue');
const Edit = () => import('./components/products/Edit.vue');

export const routes = [
    {
        name: 'verProductos',
        path: '/productos',
        component: Index
    },
    {
        name: 'crearProducto',
        path: '/crear',
        component: Create
    },
    {
        name: 'editarProducto',
        path: '/editar/:id',
        component: Edit
    },
]