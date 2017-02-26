<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="operation in operations">
                        <td v-text="operation.title"></td>
                        <td v-text="operation.type"></td>
                        <td v-text="operation.amount"></td>
                        <td v-text="operation.created_at"></td>
                        <button @click="edit(operation.id)" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <button @click="destroy(operation)" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['operations'],

        methods: {
            edit(id) {
                window.location.pathname = 'operations/' + id + '/edit';
            },

            destroy(operation) {
                let index = this.operations.indexOf(operation);

                axios.delete(`operations/${operation.id}`).
                    then(() => {
                        this.operations.splice(index, 1);
                        window.location.pathname = '/operations'
                    });
            }
        }
    }
</script>

<style>
    button {
        margin-left: 1em;
    }
</style>