const app = new Vue({
    el: '#app',
    component: {
    },
    data() {
        return {
            user_name: '',
            user_pass: '',
            user_name: '',
            user_id: '',
            login: '情報ナシ',
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
                    user_name: this.user_name,
                    user_pass: this.user_pass,
                    create_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),
                    
                )
        },
        loginchk() {
            axios
                .post('https://mp-class.chips.jp/engineergame/Loginmain.php', {
                    user_name: this.user_name,
                    user_pass: this.user_pass,
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