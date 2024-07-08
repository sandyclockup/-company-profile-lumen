<template>
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
    <section class="py-5 bg-light" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">A better way to start building.</h2>
                </div>
                <div class="col-lg-8">
                    <template v-if="loading">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <Shimmer class="mt-1 mb-2" :style="{'min-height': '4rem', 'width': '20%', 'border-radius': '10%'}" />
                                <h2 class="h5">
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem', 'width': '50%'}" />
                                </h2>
                                <p class="mb-0">
                                    <Shimmer class="" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                </p>
                            </div>
                            <div class="col mb-5 h-100">
                                <Shimmer class="mt-1 mb-2" :style="{'min-height': '4rem', 'width': '20%', 'border-radius': '10%'}" />
                                <h2 class="h5">
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem', 'width': '50%'}" />
                                </h2>
                                <p class="mb-0">
                                    <Shimmer class="" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                </p>
                            </div>
                            <div class="col mb-5 h-100">
                                <Shimmer class="mt-1 mb-2" :style="{'min-height': '4rem', 'width': '20%', 'border-radius': '10%'}" />
                                <h2 class="h5">
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem', 'width': '50%'}" />
                                </h2>
                                <p class="mb-0">
                                    <Shimmer class="" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                </p>
                            </div>
                            <div class="col mb-5 h-100">
                                <Shimmer class="mt-1 mb-2" :style="{'min-height': '4rem', 'width': '20%', 'border-radius': '10%'}" />
                                <h2 class="h5">
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem', 'width': '50%'}" />
                                </h2>
                                <p class="mb-0">
                                    <Shimmer class="" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                </p>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100" v-for="service in content.services" :key="service.id">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i :class="service.icon"></i></div>
                                <h2 class="h5">{{ service.title }}</h2>
                                <p class="mb-0">{{ service.description }}</p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Our Customer</h2>
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
                    <div class="col mb-5 mb-5 mb-xl-0" v-for="customer in content.customers" :key="customer.id">
                        <div class="text-center mb-5">
                            <img class="img-fluid rounded-circle mb-4 px-4" :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/150/150'" alt="..." />
                            <h5 class="fw-bolder">{{ customer.name }}</h5>
                            <div class="fst-italic text-muted">{{ customer.address }}</div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Testimonial 3 - Bootstrap Brain Component -->
    <section class="bg-light py-5 py-xl-8">
        <div class="container">
            <div class="text-center">
                <h2 class="fw-bolder">Testimonials</h2>
                <p class="lead fw-normal text-muted mb-5">
                    We deliver what we promise. See what clients are expressing about us.
                </p>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-0 gx-xxl-5">
                <template v-if="loading">
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                                <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                                <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                                <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="col-12 col-md-4 mb-5" v-for="testimonial in content.testimonials" :key="testimonial.id">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                        :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 50) + 1)+'/150/150'" alt="">
                                    <figcaption>
                                        <div class="mb-3 mt-2">
                                            <i class="bi bi-star text-warning me-2" v-for="idx in (Math.floor(Math.random() * 20) + 1)" :key="idx"></i>
                                        </div>
                                        <blockquote class="bsb-blockquote-icon mb-4">{{ testimonial.quote }}</blockquote>
                                        <h4 class="mb-2">{{ testimonial.name }}</h4>
                                        <h5 class="fs-6 text-secondary mb-0">{{ testimonial.position }}</h5>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
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
            document.title = 'Service | ' + process.env.VUE_APP_TITLE
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
                    let { data } =  await pageService.service()
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