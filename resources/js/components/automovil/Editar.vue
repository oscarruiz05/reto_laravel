<template>
    <div class="contanier">
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header"><h4>Editar Automovil</h4></div>
                    <div class="card-body">
                        <form @submit.prevent="actualizar">
                            <div class="mb-3">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" v-model="auto.nombre">
                            </div>
                            <div class="mb-3">
                                <label for="">Modelo</label>
                                <input type="text" class="form-control" v-model="auto.modelo">
                            </div>
                            <div class="mb-3">
                                <label for="">Marca</label>
                                <input type="text" class="form-control" v-model="auto.marca">
                            </div>
                            <div class="mb-3">
                                <label for="">Departamento</label>
                                <select class="form-control" v-model="auto.departamento">
                                    <option v-for="dpt in departamentos" :key="dpt.c_digo_dane_del_departamento">{{dpt.departamento}}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        mostrarAuto(){
            this.axios.post('/api/automovil/show/'+this.$route.params.id)
            .then(({ data }) =>{
                this.auto.nombre = data.auto_name
                this.auto.modelo = data.auto_modelo
                this.auto.marca = data.auto_marca
                this.auto.departamento = data.auto_departamento

            })
        },
        buscarDepartamentos(){
            this.axios.get('https://www.datos.gov.co/resource/xdk5-pm3f.json')
            .then(({ data }) => {
                let deptCustom = [], tmp;
                for (const iterator of data) {
                    tmp = deptCustom.filter(resp => resp.c_digo_dane_del_departamento == iterator.c_digo_dane_del_departamento);
                    if(tmp.length == 0){
                        deptCustom.push(iterator)
                    }
                }
                this.departamentos = deptCustom;
            });
        },
        actualizar(){
            this.axios.post(`/api/automovil/update/${this.$route.params.id}`, this.auto)
            .then(({ data }) =>{
                this.$router.push({name: "home"});
            });
        }
    },
    data(){
        this.buscarDepartamentos();
        this.mostrarAuto();
        return{
            departamentos: [],
            auto:{
                nombre: null,
                modelo: null,
                marca: null,
                departamento: null
            }
        }
    }
}
</script>
