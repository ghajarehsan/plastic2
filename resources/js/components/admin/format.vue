<template>
    <div>


        <div class="content">

            <div class="filter-category">


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

                            </td>


                        </tr>

                        </thead>

                        <tbody>

                        <tr>

                            <td>d</td>
                            <td>d</td>
                            <td>d</td>
                            <td>d</td>
                            <td>d</td>
                            <td>

                            </td>


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

            </div>
            <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>


    </div>
</template>

<script>
    export default {
        name: "products",

        data: function () {

            return {

                test: 'ehsan',

            }

        },

        methods: {}


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