<template>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5">
            <h1 class="fw-bolder fs-5 mb-4">Company Blog</h1>
            <div class="card border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-0" v-if="loading">
                    <Shimmer class="mt-1" :style="{'min-height': '350px', 'border-radius': '5px'}" />
                </div>
                <div class="card-body p-0" v-else>
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-5 py-lg-5">
                            <div class="p-4 p-md-5">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"  v-for="category in content.new_article.references" :key="category.id">{{ category.name }}</div>
                                <div class="h2 fw-bolder">{{ content.new_article.title }}</div>
                                <p>{{ content.new_article.description }}</p>
                                <router-link :to="{ name: 'articleDetail', params: { slug: content.new_article.slug }}"   class="stretched-link text-decoration-none">
                                    Read more
                                    <i class="bi bi-arrow-right"></i>
                                </router-link>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <div class="bg-featured-blog"
                                :style="'background-image: url(https://picsum.photos/id/'+(Math.floor(Math.random() * 50) + 1)+'/700/350)'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <template v-if="loading">
                         <Shimmer class="mt-1" :style="{'min-height': '350px', 'border-radius': '5px'}" />
                    </template>
                    <template v-else>
                        <h2 class="fw-bolder fs-5 mb-4">News</h2>
                        <!-- News item-->
                        <div class="mb-4" v-for="article in content.new_articles" :key="article.id">
                            <div class="small text-muted">{{ dateTime(article.created_at).fromNow() }}</div>
                            <router-link :to="{ name: 'articleDetail', params: { slug: article.slug }}"  class="link-dark">
                                <h3>{{ article.title }}</h3>
                            </router-link>
                        </div>
                    </template>
                </div>
                <div class="col-xl-4">
                   <template v-if="loading">
                        <Shimmer class="mt-1" :style="{'min-height': '350px', 'border-radius': '5px'}" />
                   </template>
                   <template v-else>
                        <div class="card border-0 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex h-100 align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="h6 fw-bolder">Contact</div>
                                        <p class="text-muted mb-4">
                                            For press inquiries, email us at
                                            <br />
                                            <a href="mailto:someone@example.com">sandy.andryanto.dev@gmail.com</a>
                                        </p>
                                        <div class="h6 fw-bolder">Follow Me</div>
                                        <a class="fs-5 px-2 link-dark" target="_blank" href="https://t.me/sand404"><i class="bi-telegram"></i></a>
                                        <a class="fs-5 px-2 link-dark" target="_blank" href="https://www.facebook.com/sandyandryantz"><i class="bi-facebook"></i></a>
                                        <a class="fs-5 px-2 link-dark" target="_blank" href="https://www.linkedin.com/in/sand404"><i class="bi-linkedin"></i></a>
                                        <a class="fs-5 px-2 link-dark" target="_blank" href="https://www.instagram.com/sandyandryanto"><i class="bi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </template>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bolder fs-5 mb-4">Featured Stories</h2>
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
                    <div class="col-lg-4 mb-5" v-for="article in content.stories" :key="article.id">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" :src="'https://picsum.photos/id/'+(Math.floor(Math.random() * 100) + 0)+'/600/350'" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2" v-for="category in article.references" :key="category.id">{{ category.name }}</div>
                                <router-link :to="{ name: 'articleDetail', params: { slug: article.slug }}"  class="text-decoration-none link-dark stretched-link">
                                    <div class="h5 card-title mb-3">{{ article.title }}</div>
                                </router-link>
                                <p class="card-text mb-0">{{ article.description }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" width="50" :src="article.user.gender === 'M' ? '/male.png' : '/female.png'"  alt="..." />
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
            <template v-if="!loading">
                <div class="text-end mb-5 mb-xl-0" v-if="content.continue">
                    <a class="text-decoration-none" href="#!" @click.prevent="loadMore()">
                        More stories
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </template>
        </div>
    </section>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import articleService from "@/service/article"
    import moment from 'moment'
    export default {
        components:{
            Shimmer
        },
        mounted() {
            document.title = 'Article | ' + process.env.VUE_APP_TITLE
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
                    let { data } =  await articleService.list(this.params)
                    setTimeout(() => {
                        this.content = data
                        this.loading = false
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            },
            loadMore(){
                let currentPage = localStorage.getItem('page') || '1'
                let nextPage = parseInt(currentPage) + 1
                localStorage.setItem('page', nextPage.toString())
                this.params = { page: nextPage.toString() }
                this.loading = true
                this.pingConnection()
            },
            dateTime(value) {
                return moment(value)
            }
        },
        beforeMount() {
            if(!localStorage.getItem('page')){
                localStorage.setItem('page', '1')
            }
            this.pingConnection();
        },
        data() {
            return {
                params: {
                    page: localStorage.getItem('page') || '1'
                },
                loading: true,
                content: {}
            }
        }
    }
</script>