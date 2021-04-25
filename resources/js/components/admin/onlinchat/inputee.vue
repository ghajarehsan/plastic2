<template>
    <div>



        <div class="input-group ">

            <span class="input-group-text mr-3" id="basic-addon1">

                <i class="fa fa-share " style="color: #0a53be"></i>

            </span>

            <input type="text"    aria-label="Username" aria-describedby="basic-addon1"  placeholder="در اینجا تایپ کنید" v-model="message" v-on:keyup.enter="sendmessage()">

        </div>

    </div>
</template>

<script>
    export default {
        name: "inputee",

        props: ['selectedid'],


        data: function () {

            return {

                message: ''

            }

        },

        methods: {

            sendmessage: function () {

                axios.post('/sendmessage', {

                    'selectedid': this.selectedid,

                    'message': this.message,

                }).then(response => {

                    if (response.status === 200) {

                        this.message = '';

                    }

                })

            }


        }

    }
</script>

<style scoped>


    input {

        width: 90%;
        height: 39px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 7px;

    }

    .input-group span{

        cursor: pointer;

    }

    input:focus{

        outline: none;
        box-shadow: 0 0 5px 2px #cccccc;
    }

</style>