<template>
    <div>


        <div class="content">

            <div class="filter-category">

                <div class="operation d-flex justify-content-end p-3 ">


                    <span :class="classObject" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                        <i class="fa fa-trash-alt"></i>
                        حذف آگهی
                    </span>

                    <span v-on:click="getallveblogs()" class="btn btn-sm btn-outline-dark ml-2"

                    >
                        <i class="fa fa-pen-fancy"></i>
                       بروزرسانی
                    </span>

                    <router-link :to="'/veblogs/edit/'+selectedid" target="_blank" :class="classObject2">

                        <i class="fa fa-edit"></i>
                        ویرایش


                    </router-link>


                </div>

            </div>

            <div class="main-content2">

                <div class="table-filter">

                    <table class=" table table-bordered table-hover">

                        <thead>

                        <tr>

                            <td>ردیف</td>
                            <td>عنوان</td>
                            <td>توضیحات</td>
                            <td>تعداد لایک</td>
                            <td>تعداد بازدید</td>
                            <td>وضعیت</td>
                            <td>نام نویسنده</td>
                            <td>تاریخ ایجاد</td>


                        </tr>

                        <tr>

                            <td>

                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>


                        </tr>

                        </thead>

                        <tbody>

                        <tr v-on:click="add($index,allveblog.id,allveblog.title)"
                            v-for="(allveblog , $index) in allveblogs" :class="{'status':!allveblog.status}"
                            :key="$index">

                            <td>{{$index+1}}</td>
                            <td>{{allveblog.title}}</td>
                            <td>{{allveblog.description}}</td>
                            <td>{{allveblog.like}}</td>
                            <td>{{allveblog.viewnumber}}</td>
                            <td>

                                 <span v-if="allveblog.status===1" class="text-success" style="font-size: 17px">

                                    <i class="fa fa-check"></i>

                                </span>

                                <span v-else class="text-danger" style="font-size: 19px">

                                    <i class="fa fa-times"></i>

                                </span>

                            </td>
                            <td>{{allveblog.viewnumber}}</td>
                            <td>{{allveblog.viewnumber}}</td>


                        </tr>


                        </tbody>

                    </table>

                </div>


                <div class="content-filter">


                </div>

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

                        <button type="button" class="btn btn-primary" @click="deleteveblog(selectedid)"
                        >بله
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "veblogs",

        data: function () {

            return {

                allveblogs: [],

                toast: '',

                namefordelet: '',

                selectedid: '',

                isActive: true,


            }

        },


        mounted: function () {

            this.getallveblogs();

        },

        methods: {

            add: function (key, id, name) {

                this.isActive = false;

                this.selectedid = id;

                this.namefordelet = name;

                if (this.key % 2 !== 0) {

                    $('tbody tr').eq(this.key).css('background', 'rgba(0,0,0,0.06)').css('color', 'black');

                }
                else {
                    $('tbody tr').eq(this.key).css('background', 'white').css('color', 'black');
                }

                this.key = key;

                $('tbody tr').eq(key).css('background', '#4ba4fe').css('color', 'white');

            },

            getallveblogs: function () {

                axios.post('/getallveblogs').then(response => {

                    this.allveblogs = response.data;

                }).catch(errors => {


                    this.toast = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            deleteveblog: function (id) {

                $('.closemodal').trigger('click');

                axios.post('/deleteveblog', {

                    id: id,

                }).then(response => {


                    if (response.data === 1) {

                        this.toast = '';

                        this.toast = 'با موفقیت حذف گردید'

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.getallveblogs();

                    }
                    else {

                        this.toast = 'با خطا مواجه شدیم'

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(errors => {

                    this.toast = errors.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');


                });


            }


        },

        computed: {

            classObject: function () {
                return {

                    'disabled': this.isActive,
                    'btn-sm': true,
                    'btn': true,
                    'btn-outline-danger': true,
                    'ml-2': true,

                }

            },

            classObject2: function () {
                return {

                    'disabled': this.isActive,
                    'btn-sm': true,
                    'btn': true,
                    'btn-outline-info': true,
                    'ml-2': true,

                }
            }
        }


    }


</script>

<style scoped>


    .content {

        border: 1px solid #cccccc;
        border-radius: 10px;
        height: 800px;
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

    .status {
        background: rgba(171, 255, 150, 1) !important;
    }


</style>