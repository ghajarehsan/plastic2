<template>
    <div>

        <div class=messages>

            <messages :messages="messages" :selectedid="adminid" >


            </messages>

        </div>

        <div class="input">

            <inputs v-on:getsession="getsession">


            </inputs>

        </div>

    </div>
</template>

<script>

    import messages from './messages';

    import inputee from './inputee';

    export default {
        name: "chat",

        data: function () {

            return {

                adminid: '',

                session: '',

                messages: []


            }

        },

        methods: {

            getadmin: function () {

                axios.post('/getadmin').then(response => {

                    this.adminid = response.data;

                });

            },

            getsession: function () {

                axios.post('/getsession').then(response => {

                    this.session = response.data;

                });

            },

            getmessages: function (adminid) {

                axios.post('/getmessages', {

                    'selected': adminid,

                }).then(response => {

                    this.messages = response.data;

                });

            },

            pusher: function () {

                Echo.channel('ehsanchanel')
                    .listen('TestEvent', (e) => {

                        if (this.session === e.from) {

                            this.getmessages(this.adminid);

                        }
                        else if (this.session == e.to) {

                            this.getmessages(this.adminid);

                        }

                    });

            }


        },

        created: function () {

            this.pusher();

            this.getadmin();


        },

        components: {

            'messages': messages,

            'inputs': inputee,

        }

    }
</script>

<style scoped>

</style>