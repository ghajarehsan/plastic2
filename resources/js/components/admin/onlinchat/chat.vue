<template>
    <div>

        <div class="d-flex justify-content-end flex-wrap chat">

            <div class="col-lg-8 col-sm-12 p-0">

                <div class="message">

                    <messages :messages="messages" :selectedid="selectedid">


                    </messages>

                </div>

                <div class="input">

                    <inputee :selectedid="selectedid">


                    </inputee>

                </div>

            </div>

            <div class="col-lg-4 col-sm-12 p-0">

                <users :allusers="allusers" v-on:getmessages="getmessages" :sessionuser="sessionuser">


                </users>

            </div>


        </div>


    </div>
</template>

<script>


    import messages from './messages';

    import users from './users';

    import inputee from './inputee';


    export default {
        name: "chat",

        data: function () {

            return {

                allusers: [],

                selectedid: '',

                messages: [],

                auth: '',

                sessionuser: [],


            }

        },

        methods: {

            getallusers: function () {

                axios.post('/getallusers').then(response => {

                    this.allusers = response.data;

                }).catch(error => {

                    console.log(error);

                });

            },

            getmessages: function (id) {

                this.selectedid = id;

                this.unread();

                axios.post('/getmessages', {

                    'selected': this.selectedid,

                }).then(response => {

                    this.messages = response.data;

                }).catch(error => {

                    console.log(error);

                });

            },

            getauth: function () {

                axios.post('/getauth').then(response => {

                    this.auth = response.data;

                });

            },

            pusher: function () {

                Echo.channel('ehsanchanel')
                    .listen('TestEvent', (e) => {

                        if (this.auth.id === e.from) {

                            this.getmessages(e.to);

                        }
                        else if (this.auth.id === e.to) {

                            if (this.selectedid == e.from) {

                                this.getmessages(this.selectedid);

                            }


                        }

                    });

            },

            getallsessionuser: function () {

                axios.post('/getsessionuser').then(response => {

                    this.sessionuser = response.data;

                });

            },

            unread: function () {

                axios.post('/updateunread', {

                    'selectedid': this.selectedid,

                }).then(response => {



                }).catch(error => {


                });

            }


        },

        created: function () {

            this.getallusers();

            this.getallsessionuser();

            this.getauth();

            this.pusher();

        },

        components: {

            'users': users,

            'messages': messages,

            'inputee': inputee,

        }


    }
</script>

<style scoped>


    .chat {

        border: 1px solid #cccccc;
        border-bottom: 0;
        height: 600px;

    }

    .message {

        height: 560px;

    }

</style>