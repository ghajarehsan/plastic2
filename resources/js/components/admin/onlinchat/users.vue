<template>
    <div>

        <span class="bg-secondary head">

                کاربران مهمان

            </span>

        <ul class="p-0 session">



            <li v-for="(alluser , $index) in sessionuser" class="d-flex justify-content-end"
                v-on:click="selected(alluser.session,$index,'session')" :id="alluser.session">

                 <span class="m-3">

                    {{alluser.session}}

                </span>

                <span  class="number" v-if="alluser.unread > 0">

                    {{alluser.unread}}

                </span>

                <span class="pic">

                    <img src="/images/44.jpg"/>

                </span>


            </li>


        </ul>

        <span class="bg-secondary head">

                کاربران عضو

            </span>

        <ul class="p-0">


            <li v-for="(alluser , $index) in allusers" class="d-flex justify-content-end"
                v-on:click="selected(alluser.id,$index,'user')" :id="alluser.id">


                 <span class="m-3">

                    {{alluser.name}}

                </span>

                <span class="number" v-if="alluser.unread > 0">

                    {{alluser.unread}}

                </span>

                <span class="pic">

                    <img src="/images/44.jpg"/>

                </span>


            </li>


        </ul>

    </div>
</template>

<script>
    export default {
        name: "users",

        props: ['allusers', 'sessionuser'],

        data: function () {

            return {

                selectedid: '',

            }

        },

        methods: {

            selected: function (id,index,direct) {

                if(direct==='user'){

                    this.allusers[index]['unread']=0;

                }
                else if(direct==='session'){

                    this.sessionuser[index]['unread']=0;

                }

                $('.number' + id).html('');

                $('li').removeClass('active');

                $('#' + id).addClass('active');

                this.selectedid = id;

                this.$emit('getmessages', id);

            }

        },


    }
</script>

<style scoped>

    .active {

        background: rgba(72, 99, 77, 0.1);

    }

    .session {
        height: 300px;
    }

    ul {

        height: 248px;
        overflow-y: scroll;

    }

    ul li {

        list-style: none;
        border-bottom: 1px solid #cccccc;
        padding: 6px;
        cursor: pointer;
    }

    ul li:hover {

        background: #4ba4fe;

    }

    ul li:nth-last-child(1) {
        border-bottom: 0;
    }

    .pic {
        width: 60px;
        height: 60px;
        border-radius: 100%;
        border: 1px solid #cccccc;
        position: relative;
        overflow: hidden;
    }

    .pic img {
        width: 100%;
        height: 100%;
    }

    .number {

        width: 18px;
        height: 18px;
        border-radius: 100%;
        background: red;
        color: white;
        text-align: center;
        line-height: 20px;
        font-size: 12px;

    }

    .head{

        padding: 8px;
        border-radius: 20px;
        color: white;

    }


</style>