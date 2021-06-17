<template>
    <b-container class="py-5">

        <form @submit.prevent="save">
            <b-row class="pb-3">
                <b-col fluid>
                    <b-form-input v-model="form.task" placeholder="Enter task.."></b-form-input>
                </b-col>
                <b-col sm="auto">
                    <b-button variant="primary" @click="save()" :disabled="!form.task">
                        <b-spinner small v-if="loading" />
                        {{ !id ? 'Add' : 'Edit' }} Todo
                    </b-button>
                </b-col>
            </b-row>
        </form>
        
        <b-alert :variant="variant" :show="message ? true :false" class="mt-3 mb-0">
            {{ message }}
        </b-alert>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Task</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="!todos.length">
                    <td colspan="2" class="text-center">No todos found.</td>
                </tr>
                <tr v-for="(todo, index) in todos" :key="index">
                    <td>{{ todo.task }}</td>
                    <td>
                        <b-button variant="primary" @click="edit(index)" size="sm">
                            Edit
                        </b-button>
                        <b-button variant="danger" @click="destroy(index)" size="sm">
                            Delete
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>

        <p>Todo Count: {{ todoCount }}</p>
    </b-container>
</template>

<script>
export default  {
    props: ['todos'],
    data() {
        return {
            form: this.$inertia.form({
                task: null,
                edit: false,
            }),
            id: 0,
            message: null,
            variant: null,
            loading: false,
        }
    },
    watch: {
        'message': function() {
            setTimeout(() => {
                this.message = null;
                this.variant = null;
            }, 3000)
        }
    },
    methods: {
        edit(index) {
            this.form.edit = true;
            this.form.task = this.todos[index].task;
            this.id = this.todos[index].id;
        },
        destroy(index) {
            this.$inertia.delete(`/${this.todos[index].id}`);
            this.variant = 'danger';
            this.message = this.$page.props.flash.message;
        },
        save() {
            this.loading = true;
            this.form.transform((data) => ({
                ...data,
                _method: data.edit ? 'PUT' : 'POST'
            })).post(this.form.edit ? `/${this.id}` : '/', {
                onSuccess: () => {
                    this.form.reset();
                    this.id = 0;
                    this.message = this.$page.props.flash.message;
                    this.variant = 'success';
                    this.loading = false;
                },
                preserveState: true,
            });
        },
    },
    computed: {
        todoCount() {
            return this.todos.length;
        }
    }
}
</script>

<style lang="scss">
    th:last-child div {
        display: none;
    }
    td:last-child {
        text-align: right;
    }
</style>