<template>
    <div>

        <router-view>


        </router-view>


        <div class="content">

            <div class="filter-category">


                <div class="operation d-flex justify-content-end p-3 ">

                      <span v-on:click="getallproduct()" class="btn btn-sm btn-outline-dark ml-2"

                      >
                        <i class="fa fa-pen-fancy"></i>
                       بروزرسانی
                    </span>


                    <router-link :to="'/products/edit/'+selectedid" target="_blank" :class="classObject2">

                        <i class="fa fa-edit"></i>
                        ویرایش


                    </router-link>


                    <span :class="classObject" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                        <i class="fa fa-trash-alt"></i>
                        حذف محصول
                    </span>


                    <router-link to="/products/addproduct" target="_blank"
                                 class="btn btn-outline-secondary btn-sm ml-2">

                        <i class="fa fa-plus-square"></i>
                        افزودن محصول


                    </router-link>


                </div>

            </div>

            <div class="main-content2">

                <div class="table-filter">

                    <table class="table-bordered">

                        <thead>

                        <tr>

                            <td>ردیف</td>
                            <td>آی دی</td>
                            <td>نام</td>
                            <td>قیمت</td>
                            <td>نام مدیر</td>
                            <td>نام شرکت تولید کننده</td>
                            <td>زیر مجموعه دسته</td>
                            <td>وضعیت</td>
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
                                <select class="form-select">
                                    <option>-</option>
                                    <option style="color: green">تایید شده</option>
                                    <option style="color: red">تایید نشده</option>
                                </select>
                            </td>

                            <td>
                                <input type="text" class="form form-control"/>
                            </td>


                        </tr>

                        </thead>

                        <tbody>

                        <tr v-on:click="add($index,allproduct.id,allproduct.name)"
                            v-for="(allproduct ,$index) in allproducts"
                            :key="$index">

                            <td>{{$index}}</td>
                            <td>{{allproduct.id}}</td>
                            <td>{{allproduct.name}}</td>
                            <td>{{allproduct.price}}</td>
                            <td>{{allproduct.user.name}}</td>
                            <td>{{allproduct.user.namefactory}}</td>
                            <td>{{allproduct.category.name}}</td>
                            <td>

                                <span v-if="allproduct.status===1" class="text-success" style="font-size: 17px">

                                    <i class="fa fa-check"></i>

                                </span>

                                <span v-else class="text-danger" style="font-size: 19px">

                                    <i class="fa fa-times"></i>

                                </span>

                            </td>
                            <td>{{allproduct.date}}</td>

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

                {{toast.deleterror}}

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

                        <button type="button" class="btn btn-primary" @click="deletproduct(selectedid)"
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
        name: "products",

        data: function () {

            return {

                allproducts: [],

                key: '',

                selectedid: '',

                namefordelet: '',

                isActive: true,

                toast: {

                    deleterror: '',
                }

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

        },

        mounted: function () {

            this.getallproduct();

        },

        methods: {

            getallproduct: function () {


                axios.post('/getallproduct').then(response => {

                    this.allproducts = response.data;

                }).catch(errors => {

                });

            },

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

            deletproduct: function (id) {

                $('.closemodal').trigger('click');

                axios.post('/deletproduct', {

                    id: id,

                }).then(response => {


                    if (response.data === 1) {

                        this.toast.deleterror = '';

                        this.toast.deleterror = 'با موفقیت حذف گردید'

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.getallproduct();

                    }
                    else {

                        this.toast.deleterror = 'با خطا مواجه شدیم'

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(errors => {

                    this.toast.deleterror = errors;

                    $('.toast').removeClass('success').addClass('error').toast('show');


                });


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

    td {

        min-width: 150px;

    }

    .table-filter thead {

        background: rgba(0, 0, 0, 0.04);

    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #cccccc !important;
    }

    input, select {
        border: 1px solid #cccccc;
        height: 30px;
    }

    .main-content2 {
        overflow: scroll;
        height: 550px;
    }

    tbody tr:nth-child(even) {

        background: rgba(0, 0, 0, 0.06);

    }

    tbody tr:hover {

        background: rgba(0, 0, 0, 0.09);

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
