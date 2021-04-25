<template>
    <div>


        <div class="content">

            <div class="title p-3 d-flex justify-content-start">


                <h2 style="color: #4ba4fe">

                    <i class="fa fa-plus-square"></i>

                    افزودن محصول جدید
                </h2>

            </div>

            <div class="add mt-5">

                <div class="row1 d-flex justify-content-around">

                    <div class="name d-flex ">

                        <p style="width: 200px">نام محصول :</p>

                        <input type="text" class="form-control" v-model="finaldata.productname">

                    </div>


                    <div class="price  d-flex  ">

                        <p style="width: 200px">قیمت محصول :</p>

                        <input type="text" class="form-control" v-model="finaldata.productprice">


                    </div>

                </div>


            </div>

            <div class="d-flex justify-content-start mt-5  ">

                <div style="margin-right: 6rem" class="d-flex   ">

                    <p style="width: 200px">زیرمجموعه :</p>

                    <select class="form-select" v-model="finaldata.productcategory">

                        <option value="0">-</option>

                        <option v-for="allcategory in allcategorys" :value="allcategory.id">

                            {{allcategory.name}}

                        </option>

                    </select>

                </div>

                <div style="margin-right: 6rem" class="d-flex   ">

                    <router-link to="/category" target="_blank" class="btn btn-danger">

                        ایجاد دسته جدید

                    </router-link>

                </div>


            </div>

            <div class="d-flex justify-content-start mt-5  ">

                <div style="margin-right: 6rem" class="d-flex   ">

                    <p style="width: 300px">محصول برای کاربر :</p>

                    <select class="form-select" v-model="finaldata.productuser">

                        <option value="0">-</option>

                        <option v-for="alluser in allusers" :value="alluser.id">

                            {{alluser.name}}

                        </option>

                    </select>

                </div>


            </div>

            <div class="d-flex justify-content-center mt-5  ">

                <ckeditor v-model="finaldata.productdescribtion" :config="editorConfig"></ckeditor>


            </div>

            <div class="mt-5   p-5">

                <h1 style="color: rgb(75, 164, 254)">آپلود تصاویر</h1>

                <vue-dropzone style="margin-top: 20px" v-on:vdropzone-sending="sendingEvent" ref="myVueDropzone"
                              id="dropzone"
                              :options="dropzoneOptions">

                </vue-dropzone>

            </div>

            <div class="d-flex justify-content-center m-5">

                <span class="btn btn-lg btn-info" @click="finalsave()">ذخیره اطلاعات</span>

            </div>

            <div class="append">

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
        name: "addproduct",

        data: function () {

            return {

                allcategorys: [],

                allusers: [],

                editorConfig: {

                    width: '900',


                },

                dropzoneOptions: {
                    url: '/saveimageproduct',
                    thumbnailWidth: 150,
                    maxFilesize: 3.5,
                    headers: {"My-Awesome-Header": "header value"}
                },

                toast: {

                    format: 'فرمت مورد نظر غیر مجاز است',

                },

                append: [],

                finaldata: {

                    productname: '',

                    productprice: '',

                    productcategory: '',

                    productuser: '',

                    productdescribtion: '',

                    images: ''


                },


            }

        },

        mounted: function () {

            this.getallcategory();

            this.getalluser();

        },

        methods: {

            getallcategory: function () {

                axios.post('/getallcategory').then(response => {

                    this.allcategorys = response.data;

                }).catch(errors => {


                });


            },

            getalluser: function () {

                axios.post('/getalluser').then(response => {

                    this.allusers = response.data;

                }).catch(errors => {


                });


            },

            sendingEvent: function (x, y, z) {


                setTimeout(function () {

                    if (y.response !== 0 && y.response !== -1) {

                        let response = y.response;

                        console.log(y.response);

                        let item = '<input type="text" name="append[]" value="' + response + '"/>';

                        $('.append').append(item);

                    }

                    else if (y.response == 0) {


                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }


                }, '1000');

            },

            finalsave: function () {

                let number = $('.append').find('input').length;

                let value = '';

                for (let i = 0; i < number; i++) {

                    let h = $('.append').find('input').eq(i).attr('value');

                    value = value + ',' + h;
                }

                this.finaldata.images = value;

                axios.post('/finalsaveproduct', {

                    'images': this.finaldata.images,
                    'name': this.finaldata.productname,
                    'productprice': this.finaldata.productprice,
                    'productcategory': this.finaldata.productcategory,
                    'productuser': this.finaldata.productuser,
                    'productdescribtion': this.finaldata.productdescribtion,

                }).then(response => {

                    console.log(response.data);

                    if (response.data == 1) {

                        this.toast.format = 'با موفقیت دخیره شد';

                        $('.toast').removeClass('error').addClass('success').toast('show');

                        this.finaldata = [];

                        $('.append').html('');

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


    }


</script>

<style scoped>

    p {
        color: #0c4128;
    }

    .content {

        border: 1px solid #cccccc;
        border-radius: 10px;
        min-height: 800px;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.04);

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