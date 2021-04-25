<template>
    <div>

        <section v-if="allcomments.length > 0">

            <div class="other_comment">

                <div v-for="(allcomment , $index) in allcomments" class="comments mb-3">

                    <div class="main_comment mb-3">

                        <div class="d-flex">

                            <div class="comment_user  ">

                        <span class="user_icon text-center">

                            <i class="fa fa-user"></i>

                        </span>

                                <span class="mr-2">

                            {{allcomment.name}}

                        </span>

                            </div>

                            <div class="detail mr-5">

                                <div class="mb-3">

                            <span class="text-primary">
                                موضوع :
                            </span>

                                    <span>
                                {{allcomment.title}}
                                    </span>

                                </div>

                                <div>

                                     <span class="text-danger">
                                       {{allcomment.date}}
                                     </span>

                                    <span class="text-success mr-2">
                                       {{allcomment.hour}}
                                    </span>


                                    <span class="mr-3">

                                <i style="cursor:pointer;" class="fa fa-thumbs-up text-primary"
                                   @click="addlike(allcomment.id)" :id="allcomment.id"></i>

                                <span class="mr-1 ">
                                     {{allcomment.like}}
                                </span>

                            </span>

                                    <span class="mr-3">

                                <i class="fa fa-share text-primary " style="cursor: pointer"
                                   @click="openanswercomment(allcomment.id)"></i>


                            </span>

                                </div>

                            </div>

                        </div>

                        <div class="mt-5 mb-5 pr-2 pl-2">

                            <p style="height: auto;">

                                {{allcomment.text}}

                            </p>


                        </div>



                        <div style="display: none;" class="mt-2 answer_id" :id="'answerid'+allcomment.id">

                            <div class="row">

                                <div class="col-md-4" v-if="auth===0">
                                    <label for="la-13" class="form-label">نام *</label>
                                    <input type="text" class="form-control" id="la-13" v-model="answer.name">
                                </div>

                                <div class="col-md-4" v-if="auth!==0">
                        <span class="avator text-center">
                            <i class="fa fa-user"></i>
                        </span>
                                    <span class="mr-2">{{auth.name}}</span>
                                </div>


                            </div>

                            <div class="mb-3 mt-2">
                                <label for="ta-19" class="form-label">نظر خود را بنویسید</label>
                                <textarea class="form-control" id="ta-19" rows="6" v-model="answer.text"></textarea>
                            </div>


                            <div class="col-12">
                                <button @click="sendanswer(allcomment.id)" class="btn btn-primary">ارسال دیدگاه</button>
                            </div>


                        </div>


                    </div>

                    <div v-for="(answer , $index) in allcomment.answer" class="answer_comment mr-5">


                        <div class="d-flex">

                            <div class="comment_user  ">

                        <span class="user_icon text-center">

                            <i class="fa fa-user"></i>

                        </span>

                                <span class="mr-2">

                            {{answer.name}}

                        </span>

                            </div>

                            <div class="detail mr-5">

                                <div class="mb-3 text-primary">

                                    پاسخ

                                </div>

                                <div>

                                     <span class="text-danger">
                                       {{answer.date}}
                                     </span>

                                    <span class="text-success mr-2">
                                       {{answer.hour}}
                                    </span>

                                    <span class="mr-3 ">

                                        <span>
                                                <i style="cursor:pointer;" class="fa fa-thumbs-up text-primary"
                                                   @click="addlike(answer.id)" :id="answer.id"></i>

                                        </span>

                                <span class="mr-1 ">
                                    {{answer.like}}
                                </span>

                            </span>



                                </div>

                            </div>

                        </div>

                        <div class="mt-5 mb-5 pr-2">

                            <p style="height: auto;">

                                {{answer.text}}


                            </p>


                        </div>


                    </div>

                </div>


            </div>


        </section>


        <section>
            <div class="comment-single-post ">

                <div class="row">

                    <div class="col-md-4" v-if="auth===0">
                        <label for="la-1" class="form-label">نام *</label>
                        <input type="text" class="form-control" id="la-1" v-model="comment.name">
                    </div>

                    <div class="col-md-4" v-if="auth!==0">
                        <span class="avator text-center">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="mr-2">{{auth.name}}</span>
                    </div>

                    <div class="col-md-4 col-lg-4">
                        <label for="la-2" class="form-label">موضوع *</label>
                        <input type="text" class="form-control" id="la-2" v-model="comment.subject">
                    </div>

                </div>

                <div class="mb-3 mt-2">
                    <label for="ta-1" class="form-label">دیدگاهتان را بنویسید</label>
                    <textarea class="form-control" id="ta-1" rows="6" v-model="comment.text"></textarea>
                </div>


                <div class="col-12">
                    <button @click="sendcomment()" class="btn btn-primary">ارسال دیدگاه</button>
                </div>

            </div>
        </section>


        <div :animation="true" class="toast d-flex align-items-center" role="alert" aria-live="assertive"
             aria-atomic="true">
            <div class="toast-body">
                {{toast}}
            </div>
            <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>


    </div>
</template>

<script>
    export default {
        name: "sendcommentuserfactory",

        props: ['id', 'auth'],

        data: function () {

            return {

                comment: {

                    text: '',

                    subject: '',

                    userfactory_id: this.id,

                    name: ''

                },

                toast: '',

                allcomments: [],

                answer: {

                    text: '',

                    name: '',

                }
            }

        },

        methods: {

            sendcomment: function () {

                axios.post('/sendcommentuserfactory', this.comment).then(response => {

                    if (response.data === 1) {

                        this.toast = 'با موفقیت ذخیره شد پس از تایید مدیر برای همگان نمایش داده خواهد شد.';

                        $('.toast').removeClass('error').addClass('success').toast('show');
                        this.comment.subject = '';
                        this.comment.text = '';


                    }
                    else {

                        this.toast = 'با مشکل مواجه شدیم مجددا تلاش کنید.';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(error => {


                    this.toast = error;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            getallcomment: function () {

                axios.post('/getallcommentuserfactory', {

                    'id': this.id,

                }).then(response => {

                    this.allcomments = response.data;

                }).catch(error => {


                });

            },

            addlike: function (id) {

                axios.post('/addlikecommentuserfactory', {

                    'id': id,

                }).then(response => {

                    if (response.data === 1) {

                        this.getallcomment();


                        $('#' + id).addClass('active')

                        this.toast = 'لایک شما ثبت گردید.';

                        $('.toast').removeClass('error').addClass('success').toast('show');
                    }

                    else if (response.data === 0) {


                        this.toast = 'شما قبلا این کامنت رو لایک کردین.';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }

                }).catch(error => {


                    this.toast = 'با مشکل مواجه شدیم مجدد تلاش کنید.';

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            sendanswer: function (id) {

                axios.post('/sendanswercommentuserfactory', {

                    'text': this.answer.text,

                    'name': this.answer.name,

                    'id': id,

                    'userfactory_id': this.id

                }).then(response => {

                    if (response.data === 1) {

                        this.answer.text = '';

                        this.toast = 'با موفقیت ذخیره شد پس از تایید مدیر برای همگان نمایش داده خواهد شد.';

                        $('.toast').removeClass('error').addClass('success').toast('show');

                    }
                    else {

                        this.toast = 'به مشکل مواجه شدیم مجددا تلاش کنید.';

                        $('.toast').removeClass('success').addClass('error').toast('show');

                    }


                }).catch(error => {

                    this.toast = error.data;

                    $('.toast').removeClass('success').addClass('error').toast('show');

                });

            },

            openanswercomment: function (id) {

                $('#answerid' + id).slideToggle();

            }

        },

        created: function () {

            this.getallcomment();

        }

    }
</script>

<style scoped>

    .avator {

        width: 50px;
        height: 50px;
        border: 1px solid #cccccc;
        display: inline-block;
        border-radius: 100%;
        color: #cccccc;
        line-height: 48px;
        font-size: 28px;

    }

    .toast {
        position: fixed;
        bottom: 20px;
        left: 60px;
        color: white;
        z-index: 200;
    }

    .toast.success {
        background: #1d643b;
    }

    .toast.error {
        background: #dc3535;
    }

    .fa-thumbs-up.active {
        font-size: 23px;
        color: green !important;
    }


</style>