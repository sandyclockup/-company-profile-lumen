<template>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <template v-if="loading">
                            <Shimmer class="mt-1" :style="{'min-height': '1rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '1rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '1rem', 'border-radius': '5px'}" />
                        </template>
                        <template v-else>
                            <h1 class="display-5 fw-bolder text-white mb-2">{{ content.header.title }}</h1>
                            <p class="lead fw-normal text-white-50 mb-4">{{ content.header.description }}</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <template v-if="loading">
                        <Shimmer class="mt-1" :style="{'min-height': '400px', 'width': '600px', 'border-radius': '2%'}" />
                    </template>
                    <template v-else>
                        
                       <Carousel :autoplay="2000" :wrap-around="true">
                            <Slide v-for="slider in content.sliders" :key="slider.id">
                                <div class="carousel__item text-white">
                                    <img class="img-fluid rounded-3 mb-2" :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/5000/3333'"  alt="..." />
                                    <h6>{{ slider.title }}</h6>
                                    <p>{{ slider.description }}</p>
                                </div>
                            </Slide>
                            <template #addons>
                                <Pagination />
                            </template>
                        </Carousel>

                    </template>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5" id="features">
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
                            <template v-for="(service, index) in content.services" :key="service.id">
                                <template v-if="index <= 1">
                                    <div class="col mb-5 h-100">
                                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i :class="service.icon"></i></div>
                                        <h2 class="h5">{{ service.title }}</h2>
                                        <p class="mb-0">{{ service.description }}</p>
                                    </div>
                                </template>
                                <template v-else-if="index == 2">
                                    <div class="col mb-5 mb-md-0 h-100">
                                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i :class="service.icon"></i></div>
                                        <h2 class="h5">{{ service.title }}</h2>
                                        <p class="mb-0">{{ service.description }}</p>
                                    </div>
                                </template>
                                <template v-else>
                                    <div class="col h-100">
                                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i :class="service.icon"></i></div>
                                        <h2 class="h5">{{ service.title }}</h2>
                                        <p class="mb-0">{{ service.description }}</p>
                                    </div>
                                </template>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section-->
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <template v-if="loading">
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    </template>
                    <template v-else>
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"{{ content.testimonial.quote }}"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" width="80" :src="getPeopleImage()" alt="..." />
                                <div class="fw-bold">
                                    {{ content.testimonial.name }}
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    {{ content.testimonial.position }}, {{ content.testimonial.customer.name }}
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">From our blog</h2>
                        <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <template v-if="loading">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem'}" />
                            <div class="card-body p-4">
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">
                                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem'}" />
                            <div class="card-body p-4">
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">
                                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem'}" />
                            <div class="card-body p-4">
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">
                                        <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="col-lg-4 mb-5" v-for="article in content.articles" :key="article.id">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/5000/3333'" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2" v-for="category in article.references" :key="category.id">{{ category.name }}</div>
                                <router-link  class="text-decoration-none link-dark stretched-link"  :to="{ name: 'articleDetail', params: { slug: article.slug }}">
                                    <h5 class="card-title mb-3">{{ article.title }}</h5>
                                </router-link>
                                <p class="card-text mb-0">{{ article.description }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" width="50" :src="article.user.gender === 'M' ? '/male.png' : '/female.png'" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">{{ article.user.first_name }} {{ article.user.last_name }}</div>
                                            <div class="text-muted">{{ dateTime(article.updated_at).fromNow() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <!-- Call to action-->
            <template v-if="loading">
                <Shimmer class="mt-1 rounded-3" :style="{'min-height': '10rem'}" />
            </template>
            <template v-else>
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                            <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                        </div>
                        <Form @submit="submitForm" :validation-schema="valiadtionSchema">
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                
                                    <Field name="email" v-slot="{ field, errors }">
                                        <input v-bind="field" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" type="email" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                    </Field>

                                    <button class="btn btn-outline-light" :disabled="loadingSubmit" id="button-newsletter" type="submit">
                                        <i :class="loadingSubmit ? 'spinner-border spinner-border-sm me-1' : ''"></i>Sign up
                                    </button>

                                    <ErrorMessage name="email" class="error invalid-feedback" />
                                </div>
                                <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                                <div v-if="success" class="alert alert-success small mt-2" role="alert">
                                    {{ success }}
                                </div>
                            </div>
                        </Form>
                    </div>
                </aside>
            </template>
        </div>
    </section>
</template>
<script>
    import { Carousel, Pagination, Slide } from 'vue3-carousel'
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import moment from 'moment'
    import { Form, Field, ErrorMessage } from "vee-validate"
    import * as yup from "yup"
    export default {
        components:{
            Shimmer,
            Carousel,
            Slide,
            Pagination,
            Form,
            Field,
            ErrorMessage
        },
        mounted() {
            document.title = 'Home | ' + process.env.VUE_APP_TITLE
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
                    let { data } =  await pageService.home()
                    setTimeout(() => {
                        this.content = data
                        this.loading = false
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            },
            async submitForm(data){
                this.success = ""
                this.message = ""
                this.loadingSubmit = true
                await pageService.subscribe(data).then(() => { 
                    setTimeout(() => {
                        this.success = "Thank for subscribing to our newsletter."
                        this.loadingSubmit = false
                        setTimeout(() => { this.success = "" }, 2000)
                    }, 2000)
                }).catch((error) => {
                    this.loadingSubmit = false
                    this.message =
                        (error.response &&
                        error.response.data &&
                        error.response.data.message) ||
                        error.message ||
                        error.toString()
                })
            },
            getPeopleImage(){
                let arrs = ["male.png", "female.png"]
                let random = Math.floor(Math.random() * arrs.length)
                let result = arrs[random]
                return "/"+result
            },
            dateTime(value) {
                return moment(value)
            },
        },
        beforeMount() {
            this.pingConnection();
        },
        data() {
            return {
                message: "",
                success: "",
                loadingSubmit: false,
                loading: true,
                content: {},
                valiadtionSchema: yup.object().shape({
                    email: yup.string().required("Email is required!").email("Email is invalid!")
                })
            }
        }
    }
</script>