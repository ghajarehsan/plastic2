require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/***app start ***/

import maingalleryindex from './components/index/maingalleryindex';

import onlinechat from './components/onlinechat/chat';


const app = new Vue({
    el: '#app',

    data: {

        firstfilter: [],

        allproducts: [],

        numberr: 0,

        links: {

            first_page_url: 'http://localhost:8000/opratefilter?page=1',

        },

        url: 'http://localhost:8000/opratefilter?page='

    },

    mounted: function () {

        this.opratefilter();

    },

    methods: {

        opratefilter: function (url = 'http://localhost:8000/opratefilter?page=1') {

            if (this.firstfilter.length === 0) {

                this.numberr = 0;

            }

            axios.post(url, {

                'firstfilter': this.firstfilter,

                'number': this.numberr,

            }).then(response => {


                this.allproducts = response.data.data;

                this.makelinks(response.data);

                this.numberr = 1;


            }).catch(error => {

                alert(error.data.error);

            });

        },

        makelinks: function (data) {

            this.links.last_page_url = data.last_page_url;

            this.links.next_page_url = data.next_page_url;

            this.links.prev_page_url = data.prev_page_url;

            this.links.last_page = data.last_page;

            this.links.current_page = data.current_page;

        }

    },

    watch: {

        firstfilter: function () {

            this.opratefilter();

        }

    },


    components: {

        'maingalleryindex': maingalleryindex,

        'onlinechat': onlinechat,

    }

});

/***app  end ***/


/***app2 start ***/

import infinitiloading from 'vue-infinite-loading'

const app2 = new Vue({

    el: '#app2',

    data: {

        firstfilter: [],

        allproducts: [],

        numberr: 0,

        infiniteId: +new Date(),

        page: 1,

        pricestart: '0',

        priceend: '10000000',

        maker: [],

        numberformaker: '0',

    },

    mounted: function () {


    },

    methods: {

        infiniteHandler: function ($state) {

            axios.post('/getallproducts?page=' + this.page, {

                firstfilter: this.firstfilter,

                'number': this.numberr,

                'pricestart': this.pricestart,

                'priceend': this.priceend,

                'maker': this.maker,

                'numberformaker': this.numberformaker,

            }).then(response => {

                this.allproducts = this.allproducts.concat(response.data.data);

                if (response.data.data.length) {

                    this.page++;

                    $state.loaded();

                }
                else {

                    $state.complete();
                }


            }).catch(errors => {

            });

        },

        operate: function () {

            if (this.firstfilter.length === 0) {
                this.numberr = 0;
            }
            else {
                this.numberr = 1;
            }

            if (this.maker.length === 0) {

                this.numberformaker = 0;
            }
            else {
                this.numberformaker = 1;
            }

            this.page = 1;

            this.allproducts = [];

            this.infiniteId += 1;

        }

    },


    components: {

        'infinite-loading': infinitiloading,

        'onlinechat': onlinechat,



    }


});

/***app2  end ***/


/***app3 start ***/

import sendcommentuserfactory from './components/layout/sendcommentuserfactory'

const app3 = new Vue({

    el: '#app3',

    data: {

        page: 1,

        alluserfactorys: [],

        identifier: +new Date(),

        city: 0,

    },

    mounted: function () {


    },

    methods: {

        infiniteHandler: function ($state) {


            axios.post('/getalluserfactory?page=' + this.page, {

                city: this.city,

            }).then(response => {

                if (response.data.data.length) {

                    this.alluserfactorys = this.alluserfactorys.concat(response.data.data);

                    this.page++;

                    $state.loaded();

                }
                else {

                    $state.complete();

                }

            }).catch(errors => {
            });


        },


        opratefilter: function () {


            this.identifier++;

            this.page = 1;

            this.alluserfactorys = [];


        }

    },

    components: {

        'infinite-loading': infinitiloading,

        'sendcommentuserfactory': sendcommentuserfactory,

        'onlinechat': onlinechat,

    }


});

/***app3  end ***/


/***app4 start ***/

import sendcommentadvert from './components/layout/sendcommentadvert';

const app4 = new Vue({

        el: '#app4',

        data: {

            identifier: +new Date(),

            page: 1,

            alladverts: [],

        },


        methods: {

            infiniteHandler: function ($state) {

                axios.post('/getalladvert?page=' + this.page).then(response => {

                    if (response.data.data.length) {

                        this.alladverts = this.alladverts.concat(response.data.data);

                        this.page++;

                        $state.loaded();

                    }
                    else {

                        $state.complete();

                    }

                }).catch(errors => {

                });


            },


        }
        ,

        components: {

            'infinite-loading': infinitiloading,

            'sendcommentadvert': sendcommentadvert,

            'onlinechat': onlinechat,

        }

    })
;

/***app4 end ***/


/***app5 start ***/

import sendcomment from './components/layout/sendcomment';

import sendcommentveblog from './components/layout/sendcommentveblog';

const app5 = new Vue({

    el: '#app5',

    data: {

        allveblogs: [],

        page: 1,

    },

    mounted: function () {


    },

    methods: {

        infiniteHandler: function ($state) {


            axios.post('/getallveblog?page=' + this.page).then(respons => {

                if (respons.data.data.length) {

                    this.allveblogs = this.allveblogs.concat(respons.data.data);

                    this.page++;

                    $state.loaded();

                }
                else {

                    $state.complete();

                }

            }).catch(errors => {
            });


        }

    },

    components: {

        'infinite-loading': infinitiloading,

        'sendcomment': sendcomment,

        'sendcommentveblog': sendcommentveblog,

        'onlinechat': onlinechat,

    },

});

/***app5 end ***/


/***admin start ***/

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import category from './components/admin/categorys/category';

import products from './components/admin/products/products';

import addproduct from './components/admin/products/addproduct';

import editproduct from './components/admin/products/productedit';

import adverts from './components/admin/adverts/adverts';

import advertedit from './components/admin/adverts/advertedit';

import productcomment from './components/admin/comments/product/productcomment';

import productcommentedit from './components/admin/comments/product/productcommentedit';

import advertcomment from './components/admin/comments/advert/advertcomment';

import advertcommentedit from './components/admin/comments/advert/advertcommentedit';

import veblogs from './components/admin/veblogs/veblogs';

import veblogedit from './components/admin/veblogs/veblogedit';

import onlinchat from './components/admin/onlinchat/chat';

const router = new VueRouter({

        routes: [

            {
                path: '/category',
                component: category,

            },

            {
                path: '/products',
                component: products,
            },

            {

                path: '/products/edit/:id',
                component: editproduct,

            },

            {

                path: '/products/addproduct',
                component: addproduct,

            },

            {

                path: '/adverts',
                component: adverts,
            },

            {

                path: '/adverts/edit/:id',
                component: advertedit,

            },

            {

                path: '/productcomments',
                component: productcomment

            },

            {

                path: '/productcomments/edit/:id',
                component: productcommentedit,

            },

            {

                path: '/advertcomments',
                component: advertcomment,

            },

            {

                path: '/advertcomments/edit/:id',
                component: advertcommentedit,

            },

            {

                path: '/veblogs',
                component: veblogs,
            },

            {

                path: '/veblogs/edit/:id',
                component: veblogedit,

            },

            {

                path: '/onlinchat',
                component: onlinchat,

            }


        ]

    })
;


const admin = new Vue({

    el: '#admin',

    router: router,


});


/***admin end ***/
