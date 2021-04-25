<template>
    <div>


        <div class="content">

            <div class="filter-category">


                <div class="p-3">

                    افزودن دسته

                </div>

                <div class="m-3 d-flex justify-content-around">

                    <input type="text" class="form form-control" style="width: 30%" v-model="insert.name"/>

                    <select class="form-select" style="width: 30%" v-model="insert.id">

                        <option value="-1">تحت مجموعه</option>

                        <option value="0">یک دسته جدید</option>

                        <option v-for="allcategory in allcategorys" v-if="allcategory.parent===0"
                                :value="allcategory.id">

                            {{allcategory.name}}
                        </option>

                    </select>


                </div>

                <div>

                    <span class="btn btn-info" @click="addcategory()">افزودن دسته</span>

                </div>

            </div>

            <div class="main-content2">

                <div class="table-filter">

                    <table class=" table table-bordered table-hover">

                        <thead>

                        <tr>

                            <td>ردیف</td>
                            <td>آی دی</td>
                            <td>نام</td>
                            <td>نام پدر</td>
                            <td>تاریخ ایجاد</td>
                            <td>
                                حذف دسته
                            </td>


                        </tr>

                        <tr>

                            <td>

                            </td>

                            <td>
                                <input type="text" class="form form-control" v-model="tablefilter.id"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"
                                       v-model="tablefilter.name"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control" v-model="tablefilter.parent"/>
                            </td>

                            <td>
                                <input type="text" class="form form-control"
                                       v-model="tablefilter.date"/>
                            </td>
                            <td>

                            </td>


                        </tr>

                        </thead>

                        <tbody>

                        <tr v-for="(allcategory , $index) in allcategorys" :key="$index"
                            v-if="filtertableid(allcategory) && filtertablename(allcategory) && filtertableparent(allcategory) && filtertabledate(allcategory)">

                            <td>{{$index}}</td>
                            <td>{{allcategory.id}}</td>
                            <td>{{allcategory.name}}</td>
                            <td>{{allcategory.parent}}</td>
                            <td>{{allcategory.date}}</td>
                            <td>
                                <span type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                      :data-bs-target="'#exampleModal'+allcategory.id"
                                      :data-bs-id="allcategory.id">حذف</span>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" :id="'exampleModal'+allcategory.id" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="btn-close closemodal mr-0"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="font-size: 17px">

                                            آیا از حذف <span style="color: green">{{allcategory.name}}</span>مطمن هستید.

                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger closemodal"
                                                    data-bs-dismiss="modal">خیر
                                            </button>

                                            <button type="button" class="btn btn-primary  "
                                                    @click="deletcategory(allcategory.id)">بله
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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


    </div>
</template>

<script>
    export default {
        name: "category",

        data: function () {

            return {

                allcategorys: [],

                tablefilter: {

                    id: '',

                    name: '',

                    parent: '',

                    createddate: '',

                    date: '',
                },

                toast: {

                    deleterror: '',

                },

                insert: {

                    name: '',

                    id: '',

                }

            }

        },

        mounted: function () {

            this.getallcategory();

        },

        methods: {

            getallcategory: function () {

                axios.post('/getallcategory').then(response => {

                    this.allcategorys = response.data;

                }).catch(errors => {


                });

            },

            filtertableid: function (allcategory) {

                let result = false;

                if (this.tablefilter.id.length) {

                    if (allcategory.id == this.tablefilter.id) {

                        result = true;

                    }
                    else {

                        result = false;

                    }

                }

                else {

                    result = true;

                }

                return result;


            },

            filtertablename: function (allcategory) {

                let result = false;

                if (this.tablefilter.name.length) {

                    let x = allcategory.name.search(this.tablefilter.name);


                    if (x !== -1) {

                        result = true;

                    }
                    else {

                        result = false;

                    }

                }

                else {

                    result = true;

                }

                return result;


            },

            filtertableparent: function (allcategory) {

                let result = false;

                if (this.tablefilter.parent.length) {

                    if (allcategory.parent == this.tablefilter.parent) {

                        result = true;

                    }
                    else {

                        result = false;

                    }

                }

                else {

                    result = true;

                }

                return result;


            },

            filtertabledate: function (allcategory) {

                let result = false;

                if (this.tablefilter.date.length) {

                    let x = allcategory.date.search(this.tablefilter.date);


                    if (x !== -1) {

                        result = true;

                    }
                    else {

                        result = false;

                    }

                }

                else {

                    result = true;

                }

                return result;


            },

            deletcategory: function (id) {

                $('.closemodal').trigger('click');

                axios.post('/deletcategory', {

                    'id': id,

                }).then(response => {

                    if (response.data === 1) {

                        this.toast.deleterror = 'با موفقیت حذف گردید'

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.getallcategory();

                    }
                    else {

                        this.toast.deleterror = 'با خطا مواجه شدیم'

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(errors => {

                    this.toast.deleterror = errors;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            addcategory: function () {

                axios.post('/addcategory', {

                    'name': this.insert.name,

                    'id': this.insert.id,

                }).then(response => {

                    if (response.data === 1) {

                        this.insert.name = '';

                        this.insert.id = -1;

                        this.toast.deleterror = 'با موفقیت ذخیره گردید'

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.getallcategory();

                    }
                    else {

                        this.toast.deleterror = 'با خطا مواجه شدیم'

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }


                }).catch(errors => {

                    this.toast.inserterror = errors;

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