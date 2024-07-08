<template>
    <div class="container py-5">
        <div class="row h-100 justify-content-center align-items-center mt-5">
            <div class="col-md-7" v-if="loadingContent">
                <div class="card">
                    <Shimmer :style="{'min-height': '40rem'}" />
                </div>
            </div>
            <div class="col-md-7" v-else>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="p-2  text-center">
                            <i class="bi bi-person me-1"></i> Manage Profile
                        </h4>
                    </div>
                    <div class="card-body">
                        <Form @submit="submitForm" :validation-schema="valiadtionSchema" method="POST" autocomplete="off">
                            <div class="row mt-4 mb-2 justify-content-center align-items-center">
                                <div class="col-md-12">
                                    <div v-if="message" class="alert alert-danger" role="alert">
                                        {{ message }}
                                    </div>
                                    <div v-if="success" class="alert alert-success" role="alert">
                                        {{ success }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <h5>
                                            <small>Profile Picture</small>
                                        </h5>
                                        <template v-if="loadingUpload">
                                            <Shimmer :style="{'min-height': '150px', 'width': '150px', 'border-radius': '5px', 'margin':'auto' }" />
                                        </template>
                                        <template v-else>
                                            <img class="img-fluid rounded-3" width="150" :src="imgPreview" alt="..." />
                                        </template>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <input type="file" class="form-control" @change="onChangeFile" accept="image/jpeg, image/png" id="file_image" name="file_image"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                         <Field name="email"  v-model="user.email" v-slot="{ field, errors }">
                                            <input v-bind="field" placeholder="Email Address" type="email" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                        </Field>
                                        <ErrorMessage name="email" class="error invalid-feedback" />
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="first_name" class="form-label">First Name:</label>
                                        <Field name="first_name"  v-model="user.first_name" v-slot="{ field }">
                                            <input v-bind="field" placeholder="First Name" type="text" :readonly="loadingSubmit" class="form-control">
                                        </Field>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="gender" class="form-label">Gender:</label>
                                        <Field v-model="user.gender" name="gender" class="form-control" as="select">
                                            <option value="" disabled>Select a Gender</option>
                                            <option v-for="gender in genders" :key="gender.value" :value="gender.value">
                                                {{ gender.text }}
                                            </option>
                                        </Field>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="phone" class="form-label">Phone Number:</label>
                                         <Field name="phone"  v-model="user.phone" v-slot="{ field, errors }">
                                            <input v-bind="field" placeholder="Phone Number" type="text" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'">
                                        </Field>
                                        <ErrorMessage name="phone" class="error invalid-feedback" />
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="last_name" class="form-label">Last Name:</label>
                                         <Field name="last_name"  v-model="user.last_name" v-slot="{ field }">
                                            <input v-bind="field" placeholder="Last Name" type="text" :readonly="loadingSubmit" class="form-control">
                                        </Field>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="country" class="form-label">Country:</label>
                                        <Field v-model="user.country" name="country" class="form-control" as="select">
                                            <option value="" disabled>Select a Country</option>
                                            <option v-for="country in countries" :key="country" :value="country">
                                                {{ country }}
                                            </option>
                                        </Field>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <Field name="address" v-model="user.address" v-slot="{ field }">
                                    <textarea v-bind="field" rows="4" :readonly="loadingSubmit" class="form-control"></textarea>
                                </Field>
                            </div>
                            <div class="mb-3">
                                <label for="about_me" class="form-label">About Me:</label>
                                <Field name="about_me" v-model="user.about_me" v-slot="{ field }">
                                    <textarea v-bind="field" rows="4" :readonly="loadingSubmit" class="form-control"></textarea>
                                </Field>
                            </div>
                            <button type="submit" :disabled="loadingSubmit" class="btn btn-success" v-tooltip="'Update Profile'">
                                <i :class="loadingSubmit ? 'spinner-border spinner-border-sm me-1' : 'bi bi-save me-1'"></i> Save Changed
                            </button>
                            <button type="reset" class="ms-1 text-white btn btn-warning" v-tooltip="'Reset Form Data'">
                                <i class="bi bi-arrow-clockwise me-1"></i> Reset Form
                            </button>
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    import country from 'country-list-js'
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import accountService from "@/service/account"
    import { Form, Field, ErrorMessage } from "vee-validate"
    import * as yup from "yup"

    export default {
        components: {
            Shimmer,
            Form,
            Field,
            ErrorMessage
        },
        mounted() {
            document.title = 'Manage Profile | ' + process.env.VUE_APP_TITLE
        },
        methods: {
            async onChangeFile(event){
                let formData = new FormData()
                formData.append("image", event.target.files[0]);
                this.loadingUpload = true
                await accountService.profileUpload(formData).then((result) => { 
                    setTimeout(() => {
                        this.imgPreview = process.env.VUE_APP_BACKEND_URL+"/page/file/"+result.data.image
                        this.loadingUpload = false
                    }, 2000)
                }).catch((error) => {
                    this.loadingUpload = false
                    this.message =
                        (error.response &&
                        error.response.data &&
                        error.response.data.message) ||
                        error.message ||
                        error.toString()
                })
            },
            async pingConnection(){
                await pageService.ping().then(() => {
                    setTimeout(() => { 
                        let auth = this.auth
                        if(!auth){
                            this.$router.push('/auth/login') 
                        }else{
                            this.loadContent()
                        }
                    }, 2000)
                }).catch((error) => {
                    console.log(error)
                    this.$router.push('/unavailable') 
                })
            },
            async loadContent(){
                await accountService.profileDetail().then((response) => {
                    setTimeout(() => { 
                        let user = response.data

                        if(user.image){
                            this.imgPreview = process.env.VUE_APP_BACKEND_URL+"/page/file/"+user.image
                        }

                        this.countries = country.names().sort()
                        this.user = user
                        this.loadingContent = false
                    }, 2000)
                }).catch((error) => {
                    console.log(error)
                    this.$router.push('/auth/login') 
                })
            },
            async submitForm(user){
                this.success = ""
                this.message = ""
                this.loadingSubmit = true
                await accountService.profileUpdate(user).then((result) => { 
                    this.loadingSubmit = false
                    this.success = result.data.message
                    setTimeout(() => {
                        this.loadingContent = true
                        this.success = ""
                        this.message = ""
                        this.pingConnection();
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
        },
        beforeMount() {
            this.pingConnection();
        },
        data(){
            return {
                valiadtionSchema: yup.object().shape({
                   email: yup.string().required("Email is required!").email("Email is invalid!"),
                   phone: yup.string().required("Phone is required!")
                }),
                message: "",
                success: "",
                loadingUpload: false,
                loadingContent: true,
                loadingSubmit: false,
                auth: localStorage.getItem("token") !== null,
                countries: [],
                user: {},
                imgPreview:"https://dummyimage.com/150x150/343a40/6c757d",
                genders: [
                    {
                        "value": "M",
                        "text": "Male"
                    },
                    {
                        "value": "F",
                        "text": "Female"
                    }
                ],
            }
        }
    }
</script>