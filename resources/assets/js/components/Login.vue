<template>
    <div>
        <alert type="success" message="登录成功." v-if="success"></alert>
        <form action="/user" method="post" @submit.prevent="login" @keydown="clearError($event.target.name)">
            <div :class="['form-group', errors.name ? 'has-error' : '']">
                <label for="name">用户名</label>
                <input type="text" name="name" id="name" class="form-control" v-model="user.name">

                <span class="help text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
            </div>
            <div :class="['form-group', errors.password ? 'has-error' : '']">
                <label for="password">密码</label>
                <textarea name="password" id="password" class="form-control" v-model="user.password"></textarea>

                <span class="help text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
            </div>
            <button type="submit" class="btn btn-primary">登录</button>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                user: {
                    name: '',
                    password: ''
                },
                errors: [],
                success: false,
            }
        },
        methods: {
            login: function () {
                this.success = false;
                let data = this.user;

                axios.post('/login', data)
                    .then(response => this.onSuccess(response.data))
                    .catch(error => this.onFail(error.response.data));

            },
            clearError: function (field) {
                delete this.errors[field];
            },
            onSuccess: function (data) {
                if (data.success) {
                    this.success = true;
                    this.$emit('updateNotes', data.notes);
                }
                this.user = { name: '', password: '' };
            },
            onFail: function (error) {
                this.errors = error;
            }
        }
    }
</script>
