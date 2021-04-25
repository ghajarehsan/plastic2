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


                <div class="d-flex mt-3 justify-content-center">

                    <table class="  table-hover table-bordered" style="width: 90%">

                        <thead>

                        <tr>

                            <td style="width: 50px">شماره</td>

                            <td>
                                عنوان
                            </td>

                            <td>
                                توضیحات
                            </td>

                            <td>
                                پدر فرزندی
                            </td>

                            <td>
                                اولویت
                            </td>

                            <td>
                                وضعیت
                            </td>

                            <td>
                                تعداد لایک
                            </td>

                            <td>
                                تعداد بازدید
                            </td>

                            <td>
                                نام نویسنده
                            </td>

                            <td>
                                تاریخ
                            </td>

                            <td>
                                ویرایش
                            </td>

                            <td>
                                حذف
                            </td>

                        </tr>


                        </thead>

                        <tbody>

                        <tr>

                            <td style="width: 50px">

                                <span>1</span>

                            </td>

                            <td>
                                {{finaldatas.title}}
                            </td>

                            <td>
                                {{finaldatas.description}}
                            </td>

                            <td>

                                <span class="text-primary">پدر</span>


                            </td>

                            <td>
                                {{finaldatas.priority}}
                            </td>

                            <td>

                                <span v-if="finaldatas.status===1" class="text-success" style="font-size: 17px">

                                    <i class="fa fa-check"></i>

                                </span>

                                <span v-else class="text-danger" style="font-size: 19px">

                                    <i class="fa fa-times"></i>

                                </span>

                            </td>

                            <td>
                                {{finaldatas.likenumber}}
                            </td>

                            <td>
                                {{finaldatas.viewnumber}}
                            </td>

                            <td>

                            </td>

                            <td>
                                <span>{{finaldatas.date}}</span>
                                <span class="text-danger">{{finaldatas.hour}}</span>
                            </td>


                            <td>
                                <span class="btn btn-sm btn-primary "
                                      @click="getveblogsingledata(finaldatas.id)">ویرایش</span>
                            </td>

                            <td>
                                -
                            </td>

                        </tr>


                        <tr v-for="(child , $index) in  finaldatas.child" :key="$index">

                            <td style="width: 50px">

                                <span>{{$index+2}}</span>

                            </td>

                            <td>
                                {{child.title}}
                            </td>

                            <td>
                                {{child.description}}
                            </td>

                            <td>
                                <span class="text-danger">فرزند</span>
                            </td>

                            <td>
                                {{child.priority}}
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
                                {{child.likenumber}}
                            </td>

                            <td>
                                {{child.viewnumber}}
                            </td>

                            <td>
                                {{finaldatas.user.name}}
                            </td>

                            <td>
                                <span>{{child.date}}</span>
                                <span class="text-danger">{{child.hour}}</span>
                            </td>


                            <td>

                                <span class="btn btn-sm btn-primary "
                                      @click="getveblogsingledata(child.id)">ویرایش</span>

                            </td>

                            <td>
                                <span class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                      data-bs-target="#exampleModal" @click="addid(child.id,child.title)">حذف</span>
                            </td>


                        </tr>


                        </tbody>

                    </table>

                </div>


            </div>

            <div class="d-flex justify-content-center mt-5 text-success">

                <span>ویرایش اطلاعات</span>

            </div>

            <div class="d-flex justify-content-start mt-1 p-5 flex-wrap">


                <div class="col-lg-6 d-flex justify-content-between mt-4">

                    <span>عنوان :</span>

                    <input class="col-lg-5 form-control" type="text" v-model="singleveblogdata.title"/>

                </div>

                <div class="col-lg-6 d-flex justify-content-between  mt-4">

                    <span>تعداد لایک :</span>

                    <input class="col-lg-5 form-control" type="text" v-model="singleveblogdata.likenumber"/>

                </div>

                <div class="col-lg-6 d-flex justify-content-between  mt-4">

                    <span>تعداد بازدید :</span>

                    <input class="col-lg-5 form-control" type="text" v-model="singleveblogdata.viewnumber"/>

                </div>

                <div class="col-lg-6 d-flex justify-content-between mt-4">

                    <span>اولویت :</span>

                    <select class="form-select col-lg-5" v-model="singleveblogdata.priority">

                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>

                    </select>

                </div>

                <div class="col-lg-6 d-flex justify-content-between mt-4">

                    <span>وضعیت :</span>

                    <select class="form-select col-lg-5" v-model="singleveblogdata.status">

                        <option value="1" class="text-success">تایید شده</option>
                        <option value="0" class="text-danger">تایید نشده</option>

                    </select>

                </div>


            </div>


            <div class="col-lg-12 d-flex justify-content-center mb-3">

                <span>توضیحات</span>

            </div>

            <div class="d-flex justify-content-center mt-2 mb-5  ">


                <ckeditor :config="editorConfig" v-model="singleveblogdata.description"></ckeditor>


            </div>

            <div class="d-flex justify-content-around mt-3 mb-5">

                <span class="btn btn-lg btn-primary" @click="savesingleveblog()">ذخیره اطلاعات</span>
                <span :class="classObject3" @click="getveblogsingledata(editid)">بروزرسانی</span>

            </div>

            <div>

                <div class="justify-content-center text-danger">

                    <span>عکس یا ویدیو نمایش داده شود؟؟</span>

                </div>

                <div class="mt-3 d-flex justify-content-evenly">

                    <div class="custom-control custom-radio">
                        <input value="2" type="radio" id="customRadio1" v-model="singleveblogdata.imageorvideo"
                               name="customRadio"
                               class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1"> ویدیو </label>
                    </div>


                    <div class="custom-control custom-radio">
                        <input value="1" type="radio" id="customRadio2" v-model="singleveblogdata.imageorvideo"
                               name="customRadio"
                               class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2"> تصویر </label>
                    </div>

                </div>


            </div>

            <div class="d-flex justify-content-around m-4 p-5">

                <table v-show="singleveblogdata.imageorvideo=='1'" class="table table-hover table-bordered">

                    <thead>

                    <tr>

                        <td>شماره</td>
                        <td>عکس</td>
                        <td>حذف</td>

                    </tr>


                    </thead>

                    <tbody>

                    <tr v-if="images.length>0 && $index!==0" v-for="(image ,$index) in images.split(',')">

                        <td>{{$index}}</td>

                        <td>

                            <img :src="'/images/imageveblog/'+image" style="max-width: 150px"/>

                        </td>

                        <td>

                            <span class="btn btn-sm btn-danger" @click="deleteimageveblog($index)">حذف</span>

                        </td>

                    </tr>


                    </tbody>


                </table>

                <table v-show="singleveblogdata.imageorvideo=='2'" class="table table-hover table-bordered">

                    <thead>

                    <tr>

                        <td>شماره</td>
                        <td>عکس</td>
                        <td>حذف</td>

                    </tr>


                    </thead>

                    <tbody>

                    <tr v-if="videos.length>0 && $index!==0" v-for="(video ,$index) in videos.split(',')">

                        <td>{{$index}}</td>

                        <td>

                            <video controls style="max-width: 150px;">

                                <source :src="'/images/imageveblog/'+video"/>

                            </video>

                        </td>

                        <td>

                            <span class="btn btn-sm btn-danger" @click="deletevideoveblog($index)">حذف</span>

                        </td>

                    </tr>


                    </tbody>


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
                {{toast}}
            </div>
            <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close closemodal mr-0"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size: 17px">

                        آیا از حذف <span style="color: green">

                        {{this.namefordelet}}

                    </span>مطمن هستید.

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger closemodal"
                                data-bs-dismiss="modal">خیر
                        </button>

                        <button type="button" class="btn btn-primary" @click="deleteveblogchild()"
                        >بله
                        </button>
                    </div>
                </div>
            </div>
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

        data: function () {

            return {

                dropzoneOptions: {
                    url: '/saveimageveblogedit',

                    thumbnailWidth: 150,
                    maxFilesize: 3.5,
                    headers: {"My-Awesome-Header": "header value"}
                },

                finaldatas: [],

                singleveblogdata: {},

                editorConfig: {

                    width: '900',


                },

                toast: '',

                id: this.$route.params.id,

                idselectd: '',

                namefordelet: '',

                images: '',

                videos: '',

                editid: '',


            }

        },

        mounted: function () {


            this.getveblog();


        },

        methods: {

            getveblog: function () {

                this.singleveblogdata = [];

                this.images = '';

                axios.post('/getveblog', {

                    'id': this.id,

                }).then(response => {

                    console.log(response.data);

                    this.finaldatas = response.data;


                }).catch(errors => {

                    this.toast = 'به مشکل خردیم دوباره امتحان کنید';

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            deleteveblogchild: function () {

                axios.post('/deleteveblogchild', {

                    'id': this.selectedid,

                }).then(response => {

                    $('.closemodal').trigger('click');

                    if (response.data === 1) {

                        this.toast = 'با موفقیت حذف گردید';

                        $('.toast').removeClass('error').addClass('success').toast('show');

                        this.getveblog();

                    }


                }).catch(errors => {


                    this.toast = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            addid: function (id, name) {

                this.selectedid = id;

                this.namefordelet = name;

            },

            getveblogsingledata: function (id) {

                this.images = '';

                this.editid = id;

                axios.post('/getveblogsingledata', {

                    'id': id,

                }).then(response => {

                    this.singleveblogdata = response.data;


                    this.images = response.data.images;

                    this.videos = response.data.videos;

                    this.switchh = response.data.imageorvideo;


                }).catch(errors => {

                    this.toast = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            savesingleveblog: function () {

                axios.post('/savesingleveblog', this.singleveblogdata).then(response => {

                    if (response.data === 1) {

                        this.toast = 'اطلاعات به موفقیت ویرایش شد';

                        $('.toast').removeClass('error').addClass('success').toast('show');

                    }
                    else {

                        this.toast = 'به مشکل بر خوردیم دوباره امتحان کنید';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }


                }).catch(errors => {

                    this.toast = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            deleteimageveblog: function (index) {

                axios.post('/deleteimageveblog', {

                    'index': index,

                    'id': this.singleveblogdata.id,

                }).then(response => {

                    console.log(response.data);

                    if (response.data === 1) {

                        this.getveblogsingledata(this.editid);

                        this.toast = 'عکس با موفقیت حذف گردید';

                        $('.toast').removeClass('error').addClass('success').toast('show');


                    }

                }).catch(errors => {

                    this.toast = errors.data;

                    $('.toast').removeClass('error').addClass('success').toast('show');


                });

            },

            deletevideoveblog: function (index) {

                axios.post('/deletevideoveblog', {

                    'index': index,

                    'id': this.singleveblogdata.id,

                }).then(response => {

                    console.log(response.data);

                    if (response.data === 1) {

                        this.getveblogsingledata(this.editid);

                        this.toast = 'ویدیو با موفقیت حذف گردید';

                        $('.toast').removeClass('error').addClass('success').toast('show');


                    }

                }).catch(errors => {

                    this.toast = errors.data;

                    $('.toast').removeClass('error').addClass('success').toast('show');


                });

            },

            sendingEvent: function (x, y, z) {

                z.append('id', this.editid);
                z.append('imageorvideo', this.singleveblogdata.imageorvideo);

                setTimeout(function () {

                    if (y.response !== '22') {


                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }
                    else {


                    }

                }, '2000');


            },


        },

        components: {

            'vue-dropzone': vue2Dropzone,

        },

        watch: {

            $route: function (to, from) {

                this.id = to.params.id;

                this.getveblog();

            },

        },

        computed: {

            classObject3: function () {
                return {

                    'disabled': this.editid.length === 0,
                    'btn-lg': true,
                    'btn': true,
                    'btn-info': true,
                }
            }


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