<template>
    <div>
        <div class="card my-5 py-5 px-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <router-link :to='{name:"crearAutomovil"}' class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</router-link>
                    </div>
                </div>
                <div class="table-resposive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr class="table-light">
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Departamento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="auto in automoviles" :key="auto.id">
                                <td class="text-center">{{auto.id}}</td>
                                <td>{{auto.auto_name}}</td>
                                <td>{{auto.auto_modelo}}</td>
                                <td>{{auto.auto_marca}}</td>
                                <td>{{auto.auto_departamento}}</td>
                                <td class="text-center text-white">
                                    <router-link :to='{name:"editarAutomovil", params:{id:auto.id}}' class="btn btn-warning"><i class="fas fa-pen"></i> Editar</router-link>
                                    <a type="button" class="btn btn-danger" @click="eliminarAuto(auto.id)"><i class="fas fa-trash"></i> Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        mostrarAutos(){
            this.axios.post('/api/automovil')
            .then(res => {
                this.automoviles = res.data
            });
        },
        eliminarAuto(id){
            if(confirm('¿Desea eliminar este vehiculo?')){
                this.axios.post(`/api/automovil/eliminar/${id}`);
                this.mostrarAutos();
            }
        }
    },
    data(){
        this.mostrarAutos();
        return{
            automoviles: [],
        }
    }
}
</script>
