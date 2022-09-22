<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Productos</h4></div>
                <div class="card-body">
                    <form @submit.prevent="update">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="product.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="product.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Unidad de medida</label>
                                    <input type="text" class="form-control" v-model="product.unit_measurement">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Impuestos</label>
                                    <input type="text" class="form-control" v-model="product.tax">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Costo</label>
                                    <input type="text" class="form-control" v-model="product.cost">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Existencia</label>
                                    <input type="text" class="form-control" v-model="product.existence">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="text" class="form-control" v-model="product.image">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                  
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editar-product",
    data(){
        return {
            product:{
                name:"",
                description:"",
                unit_measurement:"",
                tax:"",
                cost:"",
                existence:"",
                image:""
            }
        }
    },
    mounted(){
        this.showProduct()
    },
    methods:{
        async showProduct(){
            await this.axios.get(`/api/producto/${this.$route.params.id}/edit`).then(response=>{
                const { name, description, unit_measurement, tax, cost, existence, image } = response.data
                this.product.name = name
                this.product.description = description
                this.product.unit_measurement = unit_measurement
                this.product.tax = tax
                this.product.cost = cost
                this.product.existence = existence
                this.product.image = image
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.put(`/api/producto/${this.$route.params.id}`,this.product).then(response=>{
                this.$router.push({name:"verProductos"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>