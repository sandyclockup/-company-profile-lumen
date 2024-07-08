<template>
    <div class="container py-5">
        <div class="row h-100 justify-content-center align-items-center mt-5">
            <div class="col-md-4" v-if="loadingContent">
                <div class="card">
                    <Shimmer :style="{'min-height': '30rem'}" />
                </div>
            </div>
            <div class="col-md-4" v-else>
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="p-2">
                            <i class="bi bi-lock me-1"></i> Sign Up
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center mb-2 auth-icon text-primary"><i class="bi bi-person-circle"></i></h1>
                        <Form  @submit="submitForm" :validation-schema="valiadtionSchema" method="POST" autocomplete="off">
                            <p class="card-text fw-bold text-muted text-center mb-4">
                                <small>Please complete the form below.</small>
                            </p>
                            <div v-if="message" class="alert alert-danger" role="alert">
                                {{ message }}
                            </div>
                            <div v-if="success" class="alert alert-success" role="alert">
                                {{ success }}
                            </div>
                            <div class="input-group mb-3">
                                 <Field name="email" v-slot="{ field, errors }">
                                    <input v-bind="field" placeholder="Email Address" type="email" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                </Field>
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <ErrorMessage name="email" class="error invalid-feedback" />
                            </div>
                            <div class="input-group mb-3">
                                <Field name="password" v-slot="{ field, errors }">
                                    <input v-bind="field" placeholder="Password" type="password" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                </Field>
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="bi bi-key"></i>
                                </span>
                                 <ErrorMessage name="password" class="error invalid-feedback" />
                            </div>
                            <div class="input-group mb-3">
                               <Field name="password_confirm" v-slot="{ field, errors }">
                                    <input v-bind="field" placeholder="Password Confirmation" type="password" :readonly="loading" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                </Field>
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="bi bi-key"></i>
                                </span>
                                 <ErrorMessage name="password_confirm" class="error invalid-feedback" />
                            </div>
                            <button type="submit"  class="btn btn-primary w-100" v-tooltip="'Create new account now'">
                                <i :class="loadingSubmit ? 'spinner-border spinner-border-sm me-1' : 'bi bi-pencil me-1'"></i> Register Now
                            </button>
                            <div class="mt-3 text-center">
                                <router-link class="text-decoration-none" to="/auth/login" v-tooltip="'Users enter their email and password in the designated fields to access their accounts'">
                                    <i class="bi bi-arrow-left me-1"></i>Already have an account ? <strong>Log In</strong>
                                </router-link>
                            </div>
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import authService from "@/service/auth"
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
            document.title = 'Sign Up | ' + process.env.VUE_APP_TITLE
        },
        methods: {
             async pingConnection(){
                await pageService.ping().then(() => {
                    setTimeout(() => { 
                        this.loadContent()
                    }, 2000)
                }).catch((error) => {
                    console.log(error)
                    this.$router.push('/unavailable') 
                })
            },
            async submitForm(user){
                this.success = ""
                this.message = ""
                this.loadingSubmit = true
                await authService.register(user).then(() => { 
                    this.loadingSubmit = false
                    this.success = "Your account has been created. You can now login."
                    setTimeout(() => {
                        this.$router.push('/auth/login') 
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
            loadContent(){
                let auth = this.auth
                setTimeout(() => {
                    if(!auth){
                        this.loadingContent = false
                    }else{
                        this.$router.push('/') 
                    }
                }, 1500)
            }
        },
        beforeMount() {
            this.pingConnection();
        },
        data(){
            return {
                success: "",
                message: "",
                loadingContent: true,
                loadingSubmit: false,
                auth: localStorage.getItem("token") !== null,
                valiadtionSchema: yup.object().shape({
                    email: yup.string().max(255).required("Email is required!").email("Email is invalid!"),
                    password: yup.string().min(8).required("Password is required!"),
                    password_confirm: yup.string().min(8).required("Password Confirmation is required!").oneOf([yup.ref('password'), null], 'Passwords must match'),
                })
            }
        }
    }
</script>