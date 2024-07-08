<template>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Frequently Asked Questions</h1>
                <p class="lead fw-normal text-muted mb-0">How can we help you?</p>
            </div>
            <div class="row gx-5">
                <div class="col-xl-8">
                    <template v-if="loading">
                        <div class="text-center">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                        <div class="text-center mt-5">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                        <div class="text-center mt-5">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                        <div class="text-center mt-5">
                            <Shimmer class="mt-1 card-img-top" :style="{'min-height': '12rem', 'border-radius': '5px'}" />
                            <Shimmer class="mt-2" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '0.7rem'}" />
                        </div>
                    </template>
                    <template v-else>
                        <!-- FAQ Accordion 1-->
                        <h2 class="fw-bolder mb-3">Account &amp; Billing</h2>
                        <div class="accordion mb-5" id="accordionExample">
                            <div class="accordion-item" v-for="(faq, index) in content.faqs1" :key="faq.id">
                                <h3 class="accordion-header" :id="`faq`+faq.id"><button :class="index === 0 ? 'accordion-button' : 'accordion-button collapsed'" type="button"
                                        data-bs-toggle="collapse" :data-bs-target="`#collapse`+faq.id" :aria-expanded="index === 0 ? 'true' : 'false'"
                                        :aria-controls="`collapse`+faq.id">{{ faq.question }}</button></h3>
                                <div :class="index === 0 ? 'accordion-collapse collapse show' : 'accordion-collapse collapse'" :id="`collapse`+faq.id" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ faq.answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Accordion 2-->
                        <h2 class="fw-bolder mb-3">Website Issues</h2>
                        <div class="accordion mb-5 mb-xl-0" id="accordionExample2">
                            <div class="accordion-item" v-for="(faq, index) in content.faqs2" :key="faq.id">
                                <h3 class="accordion-header" :id="`faq`+faq.id"><button :class="index === 0 ? 'accordion-button' : 'accordion-button collapsed'" type="button"
                                        data-bs-toggle="collapse" :data-bs-target="`#collapse`+faq.id" :aria-expanded="index === 0 ? 'true' : 'false'"
                                        :aria-controls="`collapse`+faq.id">{{ faq.question }}</button></h3>
                                <div :class="index === 0 ? 'accordion-collapse collapse show' : 'accordion-collapse collapse'" :id="`collapse`+faq.id" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        {{ faq.answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="col-xl-4">
                    <div class="card border-0 bg-light mt-xl-5">
                        <div class="card-body p-4 py-lg-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <div class="h6 fw-bolder">Have more questions?</div>
                                    <p class="text-muted mb-4">
                                        Contact us at
                                        <br />
                                        <a href="#!">sandy.andryanto.dev@gmail.com</a>
                                    </p>
                                    <div class="h6 fw-bolder">Follow us</div>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-twitter"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-facebook"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            document.title = 'FAQ | ' + process.env.VUE_APP_TITLE
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
                    let { data } =  await pageService.faq()
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