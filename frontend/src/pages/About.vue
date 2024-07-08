<template>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6" v-if="loading">
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                </div>
                <div class="col-lg-8 col-xxl-6" v-else>
                    <div class="text-center my-5">
                        <h1 class="fw-bolder mb-3">{{ content.header.title }}</h1>
                        <p class="lead fw-normal text-muted mb-4">{{ content.header.description }}</p>
                        <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About section one-->
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
               <template v-if="loading">
                    <div class="col-lg-6">
                        <Shimmer class="mt-1" :style="{'min-height': '400px', 'border-radius': '5px'}" />
                    </div>
                    <div class="col-lg-6">
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    </div>
               </template>
               <template v-else>
                     <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0"
                        :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/600/400'" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">{{ content.section1.title }}</h2>
                        <p class="lead fw-normal text-muted mb-0">{{ content.section1.description }}</p>
                    </div>
               </template>
            </div>
        </div>
    </section>
    <!-- About section two-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <template v-if="loading">
                    <div class="col-lg-6 order-first order-lg-last">
                        <Shimmer class="mt-1" :style="{'min-height': '400px', 'border-radius': '5px'}" />
                    </div>
                    <div class="col-lg-6">
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    </div>
                </template>
                <template v-else>
                    <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0"
                        :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/600/400'" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">{{ content.section2.title }}</h2>
                        <p class="lead fw-normal text-muted mb-0">{{ content.section2.description }}</p>
                    </div>
                </template>
            </div>
        </div>
    </section>
    <!-- Team members section-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Our team</h2>
                <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
            </div>
            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                <template v-if="loading">
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                    </div>
                </template>
                <template v-else>
                    <template v-for="(team, index) in content.teams" :key="team.id">
                        <template v-if="index <= 1">
                            <div class="col mb-5 mb-5 mb-xl-0">
                                <div class="text-center">
                                    <img class="img-fluid rounded-circle mb-4 px-4" width="150" :src="getPeopleImage()" alt="..." />
                                    <h5 class="fw-bolder">{{ team.name }}</h5>
                                    <div class="fst-italic text-muted">{{ team.position_name }}</div>
                                </div>
                            </div>
                        </template>
                        <template v-else-if="index == 2">
                            <div class="col mb-5 mb-5 mb-sm-0">
                                <div class="text-center">
                                    <img class="img-fluid rounded-circle mb-4 px-4" width="150" :src="getPeopleImage()" alt="..." />
                                    <h5 class="fw-bolder">{{ team.name }}</h5>
                                    <div class="fst-italic text-muted">{{ team.position_name }}</div>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <div class="col mb-5">
                                <div class="text-center">
                                    <img class="img-fluid rounded-circle mb-4 px-4" width="150" :src="getPeopleImage()" alt="..." />
                                    <h5 class="fw-bolder">{{ team.name }}</h5>
                                    <div class="fst-italic text-muted">{{ team.position_name }}</div>
                                </div>
                            </div>
                        </template>
                    </template>
                </template>
            </div>
        </div>
    </section>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    export default {
        components:{
            Shimmer
        },
        mounted() {
            document.title = 'About | ' + process.env.VUE_APP_TITLE
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
                    let { data } =  await pageService.about()
                    setTimeout(() => {
                        this.content = data
                        this.loading = false
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            },
            getPeopleImage(){
                let arrs = ["male.png", "female.png"]
                let random = Math.floor(Math.random() * arrs.length)
                let result = arrs[random]
                return "/"+result
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