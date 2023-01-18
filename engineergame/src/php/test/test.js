const app = new Vue({
    el: '#app',
    component: {
    },
    data() {
        return {
            user_name: '',
            user_pass: '',
            user_name: '',
            user_id: 0,
            login: '情報ナシ',
            clear_user_id: 0,
            clear_time: 0,
            clear_emplyee: 0,
            clear_money: 0,
            clear_score: 0,
            ranking: {},
            chk: false
        }
    },
    //ページが読み込まれた時に動く処理
    created() {
        this.get_score_rank();
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
                    (response) => (this.login = response.data)
                )
        },
        random() {
            this.clear_user_id = Math.floor(Math.random() * (20 - 1) + 1);
            this.clear_time = Math.floor(Math.random() * (20 - 1) + 1);
            this.clear_emplyee = Math.floor(Math.random() * (100 - 1) + 1);
            this.clear_money = Math.floor(Math.random() * (1000 - 100) + 100);
            this.clear_score = Math.floor(Math.random() * (1000 - 100) + 100);
        },
        create_clear_infomation() {
            axios
                .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                    user_id: this.clear_user_id,
                    clear_time: this.clear_time,
                    clear_emplyee: this.clear_emplyee,
                    clear_money: this.clear_money,
                    clear_score: this.clear_score,
                    create_clear_infomation: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data))
                )
        },
        get_score_rank() {
            axios
                .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                    get_score_rank: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    // (response) => (console.log(response.data)),
                    (response) => (this.ranking = response.data))
        },
        get_myrank() {
            axios
                .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                    user_id: this.user_id,
                    myrank: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data))
                )
        }
    },
    computed: {
    },
    watch: {
    },
});