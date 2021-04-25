<template>
    <div>


        <div class="content">

            <div class="title p-3 d-flex justify-content-start">


                <h2 style="color: #4ba4fe">

                    <i class="fa fa-plus-square"></i>

                    ویرایش محصول

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

            <div class="d-flex justify-content-around m-5">

                <span class="btn btn-lg btn-info" @click="savedata()">ذخیره اطلاعات</span>

                <span @click="getproduct()" class="brn btn-lg btn-primary">بروزرسانی</span>

            </div>

            <div class="d-flex justify-content-center mt-5">

                <table class="table-hover table-bordered" style="width: 90%">

                    <tr v-if="$index > 0  " v-for="(image , $index) in finaldata.images.split(',')"
                        :key="$index"
                    >

                        <td style="width: 50px">{{$index}}</td>
                        <td>
                            <img style="width: 150px" :src="'images/imageproducts/'+image"/>
                        </td>
                        <td>
                            <span class="btn btn-danger" @click="deleteimageproduct($index)">حذف</span>
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

            <div class="append">

            </div>

            <div class="mt-5   mb-5">

                <h1 style="color: rgb(75, 164, 254)">پارمتر ها</h1>

                <div class="justify-content-center d-flex mt-3">

                    <table class="table-hover table-bordered" style="width: 90%">

                        <tr v-for="(param , $index) in finaldata.param" :key="$index">

                            <td style="width: 50px">
                                {{$index+1}}
                            </td>

                            <td>
                                {{param.param}}
                            </td>

                            <td>
                                {{param.pivot.value}}
                            </td>

                            <td>
                                <span class="btn btn-danger" @click="deletparam(param.id)">حذف</span>
                            </td>

                        </tr>

                    </table>


                </div>

                <div class="d-flex justify-content-evenly mt-4">

                    <input type="text" class="form-control col-lg-2" placeholder="value" v-model="paramvalue"/>

                    <select class="form-select col-lg-2" v-model="selectedparam">

                        <option value="0">پارامتر</option>

                        <option v-for="allparam in allparams" :value="allparam.id">

                            {{allparam.param}}

                        </option>

                    </select>

                </div>

                <div class="d-flex justify-content-center mt-4">

                      <span class="btn btn-primary btn-lg " @click="saveparam()">
                          ذخیره
                      </span>

                </div>


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
        name: "products",

        data: function () {

            return {

                allcategorys: [],

                allusers: [],

                finaldata: {

                    productname: '',

                    productprice: '',

                    productcategory: '',

                    productuser: '',

                    productdescribtion: '',

                    images: '',

                    param: [],


                },

                editorConfig: {

                    width: '900',


                },

                dropzoneOptions: {
                    url: '/saveimageproductedit',

                    thumbnailWidth: 150,
                    maxFilesize: 3.5,
                    headers: {"My-Awesome-Header": "header value"}
                },

                toast: {

                    format: 'فرمت مورد نظر غیر مجاز است',

                },

                id: this.$route.params.id,

                allparams: [],

                selectedparam: 0,

                paramvalue: ''

            }

        },

        mounted: function () {

            this.getallcategory();

            this.getalluser();

            this.getproduct();

            this.getallparams();

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

            getproduct: function () {

                axios.post('/getproduct', {

                    'id': this.id,

                }).then(response => {

                    console.log(response.data);

                    this.finaldata.productname = response.data.name;
                    this.finaldata.productcategory = response.data.category_id;
                    this.finaldata.productuser = response.data.user_id;
                    this.finaldata.productdescribtion = response.data.describtion;
                    this.finaldata.productprice = response.data.price;
                    this.finaldata.images = response.data.imageproduct.images;
                    this.finaldata.param = response.data.params;

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

            deleteimageproduct(index) {

                axios.post('/deleteimageproduct', {

                    'id': this.id,

                    'index': index,

                }).then(response => {

                    if (response.data === 1) {

                        this.getproduct();

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


                axios.post('/savedataproductedit', {

                    'name': this.finaldata.productname,
                    'productprice': this.finaldata.productprice,
                    'productcategory': this.finaldata.productcategory,
                    'productuser': this.finaldata.productuser,
                    'productdescribtion': this.finaldata.productdescribtion,

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

            deletparam: function (paramid) {

                axios.post('/deletparam', {

                    'paramid': paramid,

                    'id': this.id,

                }).then(response => {

                    if (response.data === 1) {

                        this.toast.format = 'با موفقیت حذف شد';

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.getproduct();


                    }

                    else {

                        this.toast.format = 'به مشکل مواجه شدیم';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(error => {

                    this.toast.format = 'به مشکل مواجه شدیم';

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            getallparams: function () {

                axios.post('/getallparam').then(response => {

                    this.allparams = response.data;

                }).catch(error => {


                });
            },

            saveparam: function () {

                axios.post('/saveparam', {

                    'id': this.id,
                    'selectedparam': this.selectedparam,
                    'paramvalue': this.paramvalue,


                }).then(response => {

                    if (response.data === 1) {

                        this.toast.format = 'با موفقیت ذخیره شد';

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.getproduct();

                        this.paramvalue = '';

                        this.selectedparam = 0;


                    }
                    else {

                        this.toast.format = 'به مشکل مواجه شدیم';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(error => {

                    this.toast.format = 'به مشکل مواجه شدیم';

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