<template>
    <div>

        <div class="input-group">
            <div class="input-group-text" id="btnGroupAddon" v-on:click="send()">

                <i class="fa fa-share"></i>

            </div>
            <input type="text" class="form-control " placeholder="تایپ کنید ..." aria-label="Input group example"
                   aria-describedby="btnGroupAddon" v-model="message" v-on:keyup.enter="send()">
        </div>


    </div>
</template>

<script>
    export default {
        name: "inputee",

        data: function () {

            return {

                message: ''

            }

        },

        methods: {

            send: function () {

                this.$emit('getsession');

                axios.post('/sendsession', {

                    'message': this.message

                }).then(respons => {

                    if (respons.status === 200) {


                        this.message = '';

                    }


                });


            },


        }

    }
</script>

<style scoped>

    .input-group {
        height: 50px;
    }

    .input-group input {
        height: 50px;

    }

    .input-group input:focus {

        outline: 0;
        background: #fff;
        box-shadow: 0 0 4px 2px #ddd;
        transition: all 150ms ease-in;
        border-color: #ddd;

    }

    .input-group .input-group-text {
        border-radius: 0;
        cursor: pointer;
    }

    .input-group i {

        color: #0a53be;

    }

</style>