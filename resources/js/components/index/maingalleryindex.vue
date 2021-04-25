<template>

    <div class="slider">

        <carousel :autoplay="false" style="direction: ltr" v-if="showSlider" :items="1" :nav="true" :autoHeight="true" :loop="true">

            <img v-for="(item , index) in banners" :key="index" :src="'/images/maingalleryindex/'+item.images"/>

        </carousel>

    </div>

</template>

<script>

    import carousel from 'v-owl-carousel';


    export default {

        mounted() {
            this.getMessageList();
        },

        components: {

            carousel

        },

        data() {
            return {
                showSlider: false,
                banners: []
            }
        },
        methods: {
            getMessageList() {
                let self = this;
                axios.post('/getmaingalleryindexs').then((response) => {

                    self.banners = response.data;
                    self.showSlider = true;

                });
            }
        }
    }


</script>

<style >

    .owl-next  {

        position: absolute ;
        top: 40%  ;
        right: 60px  ;
        width: 45px  ;
        height: 45px  ;
        border: 1.5px solid #ffffff !important ;
        border-radius: 100% !important;
        opacity: 0;
        transition: all 0.4s ease;
        color: white;

    }

    .owl-next span{
        font-size: 30px;
        line-height: 40px;
        color: white;
    }

    .owl-prev{

        position: absolute ;
        top: 40% ;
        left: 60px ;
        width: 45px ;
        height: 45px ;
        border: 1.5px solid #ffffff !important;
        border-radius:100%!important ;
        opacity: 0;
        transition: all 0.4s ease;
        color: white;

    }

    .owl-prev span{
        font-size: 30px;
        line-height: 40px;
        color: white;
    }

    .slider:hover .owl-prev{

        opacity: 1;
        transform: translateX(-40px);

    }

    .owl-prev:hover{
        background: rgba(0,0,0,0.4) !important;
    }

    .owl-next:hover{
        background: rgba(0,0,0,0.4) !important;
    }

    .slider:hover .owl-next{

        opacity: 1;
        transform: translateX(+40px);

     }

    img{
        max-height: 650px;
        border-radius: 5px;
        overflow: hidden;
    }

</style>