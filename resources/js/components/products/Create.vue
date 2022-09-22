<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Producto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="create" enctype="multipart/form-data">
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
                                    <label>Image:</label><br>
                                    <input type="file" @change="getImage">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <figure>
                                    <img :src="imagen" width="40%" alt="Imagen del producto">
                                </figure>
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
    name:"create-product",
    data(){
        return {
            viewImage: "",
            product:{
                name: "",
                description: "",
                unit_measurement: "",
                tax: "",
                cost: "",
                existence: "",
                image: ""
            }
        }
    },
    methods:{
        async create(e){
            let formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('description', this.product.description);
            formData.append('unit_measurement', this.product.unit_measurement);
            formData.append('tax', this.product.tax);
            formData.append('cost', this.product.cost);
            formData.append('existence', this.product.existence);
            formData.append('image', this.product.image);
            await this.axios.post('api/producto',formData).then(response=>{
                this.$router.push({name:"verProductos"})
            }).catch(error=>{
                console.log(error)
            })
        },
        getImage(e){
            let file = e.target.files[0];
            this.product.image = file;
            this.cargarImagen(file);
        },
        cargarImagen(file){
            let reader = new FileReader();
            reader.onload = (e) => {
                this.viewImage = e.target.result;
            }
            reader.readAsDataURL(file);

        }
    },
    computed: {
        imagen(){
            return this.viewImage;
        }
    }
}
</script>