<template>
    <div>


        <div class="content">

            <div class="title p-3 d-flex justify-content-start">


                <h2 style="color: #4ba4fe">

                    <i class="fa fa-plus-square"></i>

                    ویرایش کامنت

                </h2>

            </div>

            <div class="p-3 mt-3">

                <div class="d-flex justify-content-start mr-2">

                    <span class="text-danger">

                        <i class="fa fa-pen-fancy"></i>

                        <span class="text-dark" v-if="finaldata.nazarorpasokh===0"> پاسخ ها  </span>

                        <span class="text-dark" v-else>   نظر    </span>

                    </span>

                </div>

                <div class="d-flex mt-3 justify-content-center">

                    <table class="  table-hover table-bordered" style="width: 90%">

                        <thead>

                        <tr>

                            <td style="width: 50px">شماره</td>

                            <td>
                                عنوان
                            </td>

                            <td>
                                نظر
                            </td>

                            <td>
                                تعداد لایک
                            </td>

                            <td>
                                وضعیت
                            </td>

                            <td>
                                نام نویسنده
                            </td>

                            <td>
                                برای محصول
                            </td>

                            <td>
                                تاریخ
                            </td>

                            <td>
                                مشاهده
                            </td>
                        </tr>


                        </thead>

                        <tbody>

                        <tr v-for="(child , $index) in finaldata.childs">

                            <td style="width: 50px">

                                <span>{{$index+1}}</span>

                            </td>

                            <td>
                                {{child.title}}
                            </td>

                            <td>
                                {{child.answer}}
                            </td>

                            <td>
                                {{child.like}}
                            </td>

                            <td>

                                <span v-if="child.status===1" class="text-success" style="font-size: 17px">

                                    <i class="fa fa-check"></i>

                                </span>

                                <span v-else class="text-danger" style="font-size: 19px">

                                    <i class="fa fa-times"></i>

                                </span>

                            </td>

                            <td>
                                {{child.user.name}}
                            </td>

                            <td>
                                {{child.advert.name}}
                            </td>

                            <td>

                                <span>{{child.date}}</span>
                                <span class="text-danger">{{child.hour}}</span>

                            </td>


                            <td>
                                <router-link target="_blank" :to="'/advertcomments/edit/'+child.id"
                                             class="btn btn-sm btn-primary">مشاهده
                                </router-link>
                            </td>


                        </tr>


                        </tbody>

                    </table>

                </div>


            </div>

            <div class="d-flex justify-content-center mt-5">

                این نظر از طرف کاربر

                <p class="text-success mr-2 ml-2">{{finaldata.user.name}}</p>

                و برای محصول

                <p class="text-success mr-2 ml-2 ">{{finaldata.advert}}</p>


            </div>

            <div class="p-3 mt-1 d-flex justify-content-start flex-wrap">

                <div class="col-lg-6 d-flex justify-content-between mt-5">

                    <span>عنوان نظر :</span>

                    <div class="col-lg-7">
                        <input type="text" class="form-control" v-model="finaldata.title"/>
                    </div>

                </div>

                <div class="col-lg-6 d-flex justify-content-between mt-5">

                    <span>   تعداد لایک :</span>

                    <div class="col-lg-7">
                        <input type="text" class="form-control" v-model="finaldata.like"/>
                    </div>

                </div>

                <div class="col-lg-6 d-flex justify-content-between mt-5">

                    <span>وضعیت :</span>

                    <div class="col-lg-7">

                        <select class="form-select" v-model="finaldata.status">

                            <option value="1" class="text-success">تایید شده</option>
                            <option value="0" class="text-danger">تایید نشده</option>

                        </select>

                    </div>

                </div>

                <div class="col-lg-6 d-flex justify-content-between mt-5">

                    <span>   برای کاربر :</span>

                    <div class="col-lg-7">

                        <select class="form-select" v-model="finaldata.user.id">

                            <option :value="user.id" v-for="(user , $index) in allusers">

                                {{user.name}}

                            </option>

                        </select>

                    </div>

                </div>


            </div>

            <div class="p-3 mt-3">


            </div>

            <div class="d-flex justify-content-center mt-5  ">

                <ckeditor v-model="finaldata.answer" :config="editorConfig"></ckeditor>


            </div>

            <div class="d-flex justify-content-around m-5">

                <span class="btn btn-lg btn-info" @click="savedata()">ذخیره اطلاعات</span>

                <span @click="getadvertcomment()" class="brn btn-lg btn-primary" style="cursor: pointer">بروزرسانی</span>

            </div>


        </div>

        <div :animation="true" class="toast d-flex align-items-center" role="alert" aria-live="assertive"
             aria-atomic="true">
            <div class="toast-body">
                {{toast.format}}
            </div>
            <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>


    </div>
</template>

<script>

    import CKEditor from 'ckeditor4-vue';

    window.Vue = require('vue');

    Vue.use(CKEditor);


    export default {
        name: "advertcommentedit",

        data: function () {

            return {

                finaldata: {

                    answer: '',

                    childs: [],

                    nazarorpasokh: '',

                    title: '',

                    like: '',

                    status: '',

                    user: '',

                    advert: ''

                },

                allusers: [],

                editorConfig: {

                    width: '900',


                },

                toast: {

                    format: '',

                },

                id: this.$route.params.id,


            }

        },

        mounted: function () {


            this.getadvertcomment();

            this.getalluser();


        },

        methods: {

            getadvertcomment: function () {

                axios.post('/getadvertcomment', {

                    'id': this.id,

                }).then(response => {

                    console.log(response.data);

                    this.finaldata.childs = response.data.child;

                    this.finaldata.nazarorpasokh = response.data.parent;

                    this.finaldata.title = response.data.title;

                    this.finaldata.answer = response.data.answer;

                    this.finaldata.like = response.data.like;

                    this.finaldata.status = response.data.status;

                    this.finaldata.user = response.data.user;

                    this.finaldata.advert = response.data.advert.name;


                }).catch(errors => {

                    this.toast.format = 'به مشکل خردیم دوباره امتحان کنید';

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            savedata: function () {

                axios.post('/savedataadvertcomment', {

                    'title': this.finaldata.title,
                    'like': this.finaldata.like,
                    'status': this.finaldata.status,
                    'answer': this.finaldata.answer,
                    'user': this.finaldata.user.id,
                    'id': this.id,

                }).then(response => {

                    console.log(response.data);

                    if (response.data == 1) {

                        this.toast.format = 'با موفقیت دخیره شد';

                        $('.toast').removeClass('error').addClass('success').toast('show');

                    }

                    else {

                        this.toast.format = 'به ارور رو برو شدیم';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(errors => {

                    this.toast.format = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });


            },

            getalluser: function () {

                axios.post('/getalluser').then(response => {

                    this.allusers = response.data;


                }).catch(errors => {

                    this.toast.format = errors.data;

                    $('.toast').removeClass('error').addClass('error').toast('show');

                });


            },


        },

        components: {},

        watch: {

            $route: function (to, from) {

                this.id = to.params.id;

                this.getadvertcomment();

            },

        }


    }


</script>

<style scoped>


    .content {

        border: 1px solid #cccccc;
        border-radius: 10px;
        min-height: 800px;
        overflow: hidden;

    }

    .filter-category {

        height: 250px;
        background: rgba(0, 0, 0, 0.04);
    }

    tr, td {
        padding: 5px 6px;
        font-size: 13px;

    }

    .table-filter thead {

        background: rgba(0, 0, 0, 0.04);

    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #cccccc !important;
    }

    input {
        border: 1px solid #cccccc;
        height: 30px;
    }

    .main-content2 {
        overflow: scroll;
        height: 550px;
    }

    tbody tr:nth-child(even) {

        background: rgba(0, 0, 0, 0.04);

    }

    tbody {
        border-top: none;
    }

    .toast {
        position: fixed;
        bottom: 20px;
        left: 60px;
        color: white;
    }

    .toast.success {
        background: #1d643b;
    }

    .toast.error {
        background: #dc3535;
    }


</style>