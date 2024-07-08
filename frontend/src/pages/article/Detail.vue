<template>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div v-if="loadingArticle">
                        <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                        <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                    </div>
                    <div class="d-flex align-items-center mt-lg-5 mb-4" v-else>
                        <img class="img-fluid rounded-circle" width="50" :src="content.article.user.gender === 'M' ? '/male.png' : '/female.png'" alt="..." />
                        <div class="ms-3">
                            <div class="fw-bold">{{ content.article.user.first_name }} {{ content.article.user.last_name }}</div>
                            <div class="text-muted">{{ content.article.user.about_me }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article v-if="loadingArticle">
                        <div class="mb-5 mt-1">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem', 'border-radius': '5px'}" />
                        </div>
                    </article>
                    <article v-else>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ content.article.title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{ dateTime(content.article.created_at).fromNow() }}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!" v-for="category in content.article.references" :key="category.id">{{ category.name }}</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded"
                                :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/900/400'" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="text-muted">{{ content.article.description }}</p>
                            {{ content.article.content }}
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section>
                        <div class="card" v-if="loadingComment">
                             <Shimmer :style="{'min-height': '25rem', 'border-radius': '5px'}" />
                        </div>
                        <div class="card bg-light" v-else>
                            <div class="card-body"  v-if="comments.length > 0">
                                <!-- Comment form-->
                                <div v-if="success" class="alert alert-success" role="alert">
                                    Your comment has been added !
                                </div>
                                <Form class="mb-4" @submit="submitForm" :validation-schema="valiadtionSchema" autocomplete="off" v-if="auth">
                                    <Field name="comment" v-slot="{ field, errors }">
                                        <textarea placeholder="Join the discussion and leave a comment!"  v-bind="field" rows="4" :readonly="loadingSubmit" :class="errors.length == 0 ? 'form-control' : 'form-control is-invalid'"></textarea>
                                    </Field>
                                    <ErrorMessage name="comment" class="error invalid-feedback" />
                                    <button class="btn btn-primary mt-2 btn-sm float-end" :disabled="loadingSubmit" id="submitButton" type="submit">
                                        <i :class="loadingSubmit ? 'spinner-border spinner-border-sm me-1' : 'bi bi-chat-right-text me-1'"></i> Send Comment
                                    </button>
                                </Form>
                                <template v-for="comment in comments" :key="comment.id">
                                    <Comment :comment="comment"  />
                                </template>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import articleService from "@/service/article"
    import moment from 'moment'
    import Comment from "@/components/Comment.vue"
    import { Form, Field, ErrorMessage } from "vee-validate"
    import * as yup from "yup"
    export default {
        components:{
            Shimmer,
            Comment,
            Form,
            Field,
            ErrorMessage
        },
        mounted() {
            document.title = 'Article Details | ' + process.env.VUE_APP_TITLE
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
                    let { data } =  await articleService.detail(this.$route.params.slug)
                    setTimeout(() => {
                        this.content = data
                        this.loadingArticle = false
                        this.loadComment(data.article.id)
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            },
            async loadComment(id){
               try{
                    let { data } =  await articleService.commentList(id)
                    setTimeout(() => {
                        this.comments = data.comments
                        this.loadingComment = false
                        this.success = false
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            },
            async submitForm(data, { resetForm }){
                let article_id = this.content.article.id
                this.success = false
                this.loadingSubmit = true
                await articleService.commentCreate(article_id, data).then(() => {
                    setTimeout(() => {
                        this.loadingSubmit = false
                        this.success = true
                        resetForm()
                        setTimeout(() => {
                            this.loadingComment = true
                            this.loadComment(article_id)
                        }, 1500)
                    }, 2000)
                })
            },
            dateTime(value) {
                return moment(value)
            }
        },
        beforeMount() {
            this.pingConnection();
        },
        data() {
            return {
                auth: localStorage.getItem("token") !== null,
                loadingArticle: true,
                loadingComment: true,
                loadingSubmit: false,
                success: false,
                content: {},
                comments: [],
                valiadtionSchema: yup.object().shape({
                    comment: yup.string().required("Comment is required!")
                })
            }
        }
    }
</script>