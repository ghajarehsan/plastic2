<template>
    <div>


        <div class="content">

            <div class="title p-3 d-flex justify-content-start">


                <h2 style="color: #4ba4fe">

                    <i class="fa fa-plus-square"></i>

                    ویرایش آگهی

                </h2>

            </div>

            <div class="add mt-5">

                <div class="row1 d-flex justify-content-around">

                    <div class="name d-flex ">

                        <p style="width: 200px"> عنوان آگهی :</p>

                        <input type="text" class="form-control" v-model="finaldata.advertname">

                    </div>


                    <div class="price  d-flex  ">

                        <p style="width: 200px">قیمت محصول :</p>

                        <input type="text" class="form-control" v-model="finaldata.advertprice">


                    </div>

                </div>


            </div>

            <div class="add mt-5">

                <div class="row1 d-flex justify-content-around">

                    <div class="name d-flex ">

                        <p style="width: 300px">محصول برای کاربر :</p>

                        <select class="form-select" v-model="finaldata.advertuser">

                            <option value="0">-</option>

                            <option v-for="alluser in allusers" :value="alluser.id">

                                {{alluser.name}}

                            </option>

                        </select>

                    </div>


                    <div class="price  d-flex  ">

                        <p style="width: 200px"> وضعیت :</p>

                        <select class="form-select" v-model="finaldata.status">

                            <option value="1">تایید شده</option>
                            <option value="0">تایید نشده</option>

                        </select>

                    </div>

                </div>


            </div>


            <div class="d-flex justify-content-center mt-5  ">

                <ckeditor v-model="finaldata.advertdescribtion" :config="editorConfig"></ckeditor>


            </div>

            <div class="d-flex justify-content-around m-5">

                <span class="btn btn-lg btn-info" @click="savedata()">ذخیره اطلاعات</span>

                <span style="cursor: pointer" @click="getadvert()" class="brn btn-lg btn-primary">بروزرسانی</span>

            </div>

            <div class="d-flex justify-content-center mt-5">

                <table class="  table-hover table-bordered" style="width: 90%">

                    <tr v-if="$index!==0" v-for="(image , $index) in finaldata.images.split(',')" :key="$index">

                        <td style="width: 50px">{{$index}}</td>
                        <td>
                            <img style="width: 150px" :src="'images/imageadvert/'+image"/>
                        </td>
                        <td>
                            <span class="btn btn-danger" @click="deleteimageadvert($index)">حذف</span>
                        </td>

                    </tr>

                </table>

            </div>

            <div class="mt-2   p-5">

                <h1 style="color: rgb(75, 164, 254)">اضافه کردن تصاویر</h1>

                <vue-dropzone style="margin-top: 20px" v-on:vdropzone-sending="sendingEvent" ref="myVueDropzone"
                              id="dropzone"
                              :options="dropzoneOptions">

                </vue-dropzone>

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

    import vue2Dropzone from 'vue2-dropzone';

    import 'vue2-dropzone/dist/vue2Dropzone.min.css';

    export default {
        name: "advertedit",

        data: function () {

            return {

                allusers: [],

                finaldata: {

                    advertname: '',

                    advertprice: '',

                    advertuser: '',

                    advertdescribtion: '',

                    images: '',

                    status: ''


                },

                editorConfig: {

                    width: '900',


                },

                dropzoneOptions: {
                    url: '/saveimageadvertedit',

                    thumbnailWidth: 150,
                    maxFilesize: 3.5,
                    headers: {"My-Awesome-Header": "header value"}
                },

                toast: {

                    format: 'فرمت مورد نظر غیر مجاز است',

                },

                id: this.$route.params.id,


            }

        },

        mounted: function () {

            this.getalluser();

            this.getadvert();

        },

        methods: {

            getalluser: function () {

                axios.post('/getalluser').then(response => {

                    this.allusers = response.data;

                }).catch(errors => {


                });


            },

            getadvert: function () {

                axios.post('/getadvert', {

                    'id': this.id,

                }).then(response => {

                    this.finaldata.advertname = response.data.name;
                    this.finaldata.advertuser = response.data.user_id;
                    this.finaldata.advertdescribtion = response.data.describtion;
                    this.finaldata.advertprice = response.data.price;
                    this.finaldata.images = response.data.images;
                    this.finaldata.status = response.data.status;

                }).catch(errors => {

                    this.toast.format = 'به مشکل خردیم دوباره امتحان کنید';

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            sendingEvent: function (x, y, z) {

                z.append('id', this.id);

                setTimeout(function () {

                    if (y.response !== '22') {


                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }
                    else {


                    }

                }, '2000');


            },

            deleteimageadvert(index) {

                axios.post('/deleteimageadvert', {

                    'id': this.id,

                    'index': index,

                }).then(response => {

                    if (response.data === 1) {

                        this.getadvert();

                        this.toast.format = 'با موفقیت حذف گردید';

                        $('.toast').removeClass('error').addClass('success').toast('show');

                    }

                    else {

                        this.toast.format = 'با مشکل مواجه شدیم';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(errors => {

                    this.toast.format = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            savedata: function () {


                axios.post('/savedataadvertedit', {

                    'advertname': this.finaldata.advertname,
                    'advertprice': this.finaldata.advertprice,
                    'advertuser': this.finaldata.advertuser,
                    'advertdescribtion': this.finaldata.advertdescribtion,
                    'status': this.finaldata.status,

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


            }


        },

        components: {

            'vue-dropzone': vue2Dropzone,

        },

        watch: {

            $route: function (to, from) {

                this.id = to.params.id;

                this.getproduct();

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