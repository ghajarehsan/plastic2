<template>
    <div>

        <div class="messages d-flex flex-column-reverse ">

            <li class="d-flex justify-content-start m-0" v-for="(message ,$index) in messages" :key="$index"
                :class="{receive:selectedid==message.from}">


                <span class="pic mr-3 ">

                    <img src="/images/44.jpg"/>

                </span>


                <p class="bg-primary">{{message.message}}</p>


            </li>


        </div>


    </div>
</template>

<script>
    export default {
        name: "messages",

        props: ['messages','selectedid'],


    }
</script>

<style scoped>

    .messages {
        border-left: 1px solid #cccccc;
        height: 550px;
        overflow-y: scroll;

    }

    .messages li p {

        padding: 10px 15px;
        border-radius: 5px;
        color: white;
        margin: 10px 15px 0 0;
        max-width: 400px;

    }

    .receive {

        flex-direction: row-reverse;

    }

    .receive p{
        background: #1d643b !important;
    }

    .receive .pic{

        margin-left: 15px;
    }

    .pic {
        width: 44px;
        height: 44px;
        border-radius: 100%;
        border: 1px solid #cccccc;
        position: relative;
        overflow: hidden;
    }

    .pic img {
        width: 100%;
        height: 100%;
    }

</style>