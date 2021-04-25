<template>
    <div>

        <div class="messages d-flex flex-column-reverse ">

            <li class="d-flex justify-content-start m-0" v-for="(message ,$index) in messages" :key="$index"
                :class="{receive:selectedid===message.from}">

                <p class="bg-primary">{{message.message}}</p>

            </li>


        </div>

    </div>
</template>

<script>
    export default {
        name: "messages",

        props: ['messages','selectedid'],

        data: function () {

            return {}

        },

        methods: {}

    }
</script>

<style scoped>


    .messages {
        border-left: 1px solid #cccccc;
        height: 290px;
        overflow-y: scroll;

    }

    .messages li p {

        padding: 10px 15px;
        border-radius: 5px;
        color: white;
        margin: 10px 20px 0 20px;
        max-width: 400px;

    }

    .receive {

        justify-content: flex-end !important;

    }

    .receive p{
        background: #1d643b !important;
    }


</style>