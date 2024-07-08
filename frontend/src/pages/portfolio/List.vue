<template>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Our Work</h1>
                <p class="lead fw-normal text-muted mb-0">Company portfolio</p>
            </div>
            <div class="row gx-5" v-if="loading">
                 <div class="col-lg-6">
                    <div class="position-relative mb-5">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '400px', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="position-relative mb-5">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '400px', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative mb-5 mb-lg-0">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '400px', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="position-relative">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '400px', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                    </div>
                </div>
            </div>
            <div class="row gx-5" v-else>
                <div class="col-lg-6" v-for="portfolio in content.portfolios" :key="portfolio.id">
                    <div class="position-relative mb-5">
                        <img class="img-fluid rounded-3 mb-3" :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 50) + 1)+'/600/400'" alt="..." />
                        <router-link :to="{ name: 'portfolioDetail', params: { id: portfolio.id }}"   class="h3 fw-bolder text-decoration-none link-dark stretched-link">
                           {{ portfolio.title }}
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
            <a class="btn btn-lg btn-primary" href="#!">Contact us</a>
        </div>
    </section>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import portfolioService from "@/service/portfolio"
    export default {
        components:{
            Shimmer
        },
        mounted() {
            document.title = 'Portfolio | ' + process.env.VUE_APP_TITLE
        },
        methods: {
            async pingConnection(){
                await pageService.ping().then(() => {
                    setTimeout(() => { 
                        this.loadContent()
                    }, 1500)
                }).catch((error) => {
                    console.log(error)
                    this.$router.push('/unavailable') 
                })
            },
            async loadContent(){
               try{
                    let { data } =  await portfolioService.list()
                    setTimeout(() => {
                        this.content = data
                        this.loading = false
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            }
        },
        beforeMount() {
            this.pingConnection();
        },
        data() {
            return {
                loading: true,
                content: {}
            }
        }
    }
</script>