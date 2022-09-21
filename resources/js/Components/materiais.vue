<template>
    <div class="container">
        <br>
        <div class="form-inline">
            <input type="text" v-model="item.desc" placeholder="Descrição" class="form-control" v-on:keyup.enter="addItem">
            <button @click="addItem" class="btn btn-dark"><i class="fas fa-plus"></i></button>
        </div>
        <br><br>
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-light">
                <th>ID</th>
                <th>Descrição</th>
                <th>Data Criação</th>
                <th>Data Atualização</th>
                <th class="col-2">Editar /Deletar</th>
            </thead>
            <tr v-for="(item, index) in items" :key="item.id">
                <td>
                    <span>{{item.id}}</span>
                </td>
                <td>
                    <input v-if="item.edit" type="text" v-model="item.desc" v-on:keyup.enter="editItem(item);item.edit = !item.edit">
                    <span v-else>{{item.desc}} </span>
                </td>
                <td>
                    <span>{{item.data_criacao}}</span>
                </td>
                <td>
                    <span>{{item.data_atualizacao}}</span>
                </td>
                <td>
                    <button @click="item.edit = !item.edit" class="btn btn-info"><i class="fa fa-edit"></i></button>
                    <button @click="removeItem(index, item.id)" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>

export default ({
    mounted(){
        this.getItems();
    },
    data() {
        return {
            item: {
                id: "",
                desc: "",
                data_criacao: "",
                data_atualizacao: "",
                edit: false
            },
            items: []
        }
    },
    watch: {

    },
	methods: {
        getItems(){
            axios
            .get('/materiais')
            .then((res) => {
                res.data.forEach(element => {
                    this.items.push({
                        id: element.id,
                        desc: element.descricao,
                        data_criacao: element.created_at,
                        data_atualizacao: element.updated_at,
                        edit: false
                    });
                });
            })
            .catch((error) => {
                console.log(error.res.data);
            });
        },
        addItem(){
            let descricao = this.item.desc;
            this.item = [];
            axios
            .post('/materiais', {
                descricao: descricao
            })
            .then((res) => {
                this.items.push({
                    id: res.data.id,
                    desc: res.data.descricao,
                    data_criacao: res.data.created_at,
                    data_atualizacao: res.data.updated_at,
                    edit: false
                });
            })
            .catch((error) => {
                console.log(error.res.data);
            });
        },
        editItem(item){
            axios
            .put('/materiais/'+ item.id + '?descricao='+ item.desc)
            .then((res) => {
                console.log(res)
            })
            .catch((error) => {
                console.log(error.res.data);
            });
        },
        removeItem(index, itemId){
            this.items.splice(index, 1);
            axios
            .delete('/materiais/'+ itemId)
            .then((res) => {
                console.log(res)
            })
            .catch((error) => {
                console.log(error.res.data);
            });
        }
    }
})
</script>
