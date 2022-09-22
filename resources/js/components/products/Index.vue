<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to='{name:"crearProducto"}' class="btn btn-success"> Agregar Producto </router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Unidad de medida</th>
                            <th>Impuestos</th>
                            <th>Costos</th>
                            <th>Existencia</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" :key="product.id">
                            <td>{{product.id}}</td>
                            <td>{{product.name}}</td>
                            <td>{{product.description}}</td>
                            <td>{{product.unit_measurement}}</td>
                            <td>{{product.tax}}</td>
                            <td>{{product.cost}}</td>
                            <td>{{product.existence}}</td>
                            <td>
                                <img :src="'/storage/'+ product.image" width="20%">
                            </td>
                            <td>
                                <router-link :to='{name:"editarProducto",params:{id:product.id}}' class="btn btn-info">Editar</router-link>
                                <a href="" type="button" @click="deleteProduct(product.id)" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"productos",
    data(){
        return{
            products:[]
        }
    },
    mounted(){
        this.mostrarProductos()
    },
    methods:{
        async mostrarProductos(){
            await this.axios.get('/api/producto').then(response=>{
                this.products = response.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
        deleteProduct(id){
            if(confirm("¿Desea eliminar el registro?")){
                this.axios.delete(`/api/producto/${id}`).then(response=>{
                    this.mostrarProductos()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
