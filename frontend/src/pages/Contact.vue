<template>
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="py-5 px-4 px-md-5 mb-5" v-if="loadingContent">
                <Shimmer :style="{'min-height': '768px', 'border-radius': '1%'}" />
            </div>
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5" v-else>
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i>
                    </div>
                    <h1 class="fw-bolder">Get in touch</h1>
                    <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <Form id="contactForm" @submit="submitForm" :validation-schema="valiadtionSchema" method="POST" autocomplete="off">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <Field name="name" v-slot="{ field, errors }">
                                    <input v-bind="field" placeholder="Enter your name..." type="text" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                </Field>
                                <label for="name">Full name</label>
                                <ErrorMessage name="name" class="error invalid-feedback" />
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <Field name="email" v-slot="{ field, errors }">
                                    <input v-bind="field" placeholder="name@example.com" type="email" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                </Field>
                                <label for="email">Email address</label>
                                <ErrorMessage name="email" class="error invalid-feedback" />
                            </div>
                            <!-- Subject input-->
                            <div class="form-floating mb-3">
                                <Field name="subject" v-slot="{ field, errors }">
                                    <input v-bind="field" placeholder="Enter your subject..." type="text" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                </Field>
                                <label for="subject">Subject</label>
                                <ErrorMessage name="subject" class="error invalid-feedback" />
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <Field name="message" v-slot="{ field, errors }">
                                    <textarea style="height: 10rem"  placeholder="Enter your message here..."  v-bind="field" rows="4" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'"></textarea>
                                </Field>
                                <label for="message">Message</label>
                                <ErrorMessage name="message" class="error invalid-feedback" />
                            </div>

                            <div v-if="success" id="submitSuccessMessage" class="alert alert-success">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <router-link class="text-decoration-none" to="/auth/register" v-tooltip="'The process of registering for a new user account on a website.'">
                                        <strong>{{ site }}</strong>
                                    </router-link>
                                </div>
                            </div>

                            <div v-if="message" class="alert alert-danger">
                                <div class="text-center text-danger mb-3">{{ message }}</div>
                            </div>
                            
                            <!-- Submit Button-->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" :disabled="loadingSubmit" id="submitButton" type="submit">
                                    <i :class="loadingSubmit ? 'spinner-border spinner-border-sm me-1' : 'bi bi-envelope me-1'"></i> Send Message
                                </button>
                            </div>
                        </Form>
                    </div>
                </div>
            </div>
            <!-- Contact cards-->
            <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                <template v-if="loadingContent">
                    <div class="col">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                    </div>
                    <div class="col">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                    </div>
                    <div class="col">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                    </div>
                    <div class="col">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                    </div>
                </template>
                <template v-else>
                    <div class="col" v-for="service in content.services" :key="service.id">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                            <i :class="service.icon"></i></div>
                        <div class="h5 mb-2">{{ service.title }}</div>
                        <p class="text-muted mb-0">{{ service.description }}</p>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import { Form, Field, ErrorMessage } from "vee-validate"
    import * as yup from "yup"
    export default {
        components:{
            Shimmer,
            Form,
            Field,
            ErrorMessage
        },
        mounted() {
            document.title = 'Contact | ' + process.env.VUE_APP_TITLE
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
            async submitForm(data, { resetForm }){
                this.success = false
                this.message = ""
                this.loadingSubmit = true
                await pageService.message(data).then(() => { 
                    setTimeout(() => { 
                        this.loadingSubmit = false
                        this.success = true
                        resetForm()
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
            async loadContent(){
               try{
                    let { data } =  await pageService.contact()
                    setTimeout(() => {
                        this.content = data
                        this.loadingContent = false
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
                site: process.env.VUE_APP_TITLE,
                loadingContent: true,
                loadingSubmit: false,
                success: false,
                content: {},
                valiadtionSchema: yup.object().shape({
                    email: yup.string().required("Email is required!").email("Email is invalid!"),
                    name: yup.string().required("Name is required!"),
                    subject: yup.string().required("Subject is required!"),
                    message: yup.string().required("Message is required!")
                })
            }
        }
    }
</script>