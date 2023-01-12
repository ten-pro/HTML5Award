const app = new Vue({
    el: '#app',
    component: {
    },
    data() {
        return {
            login_name: '',
            login_pass: '',
            user_name: '',
            user_id: '',
            login: false
        }
    },
    //ページが読み込まれた時に動く処理
    created() {
    },
    updated() {
    },
    methods: {
        create_user() {
            axios
                .post('https://mp-class.chips.jp/engineergame/Loginmain.php', {
                    name: this.create_name,
                    pass: this.create_pass,
                    create_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data))
                )
        },
        loginchk() {
            axios
                .post('https://mp-class.chips.jp/engineergame/Loginmain.php', {
                    user_name: this.login_name,
                    user_pass: this.login_pass,
                    login_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (this.login = response.data),
                    (response) => (console.log(response.data))
                )
        }
    },
    computed: {
    }
});