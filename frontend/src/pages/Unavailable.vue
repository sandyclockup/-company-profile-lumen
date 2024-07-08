<template>
    <div class="container py-5">
            <div class="row h-100 justify-content-center align-items-center mt-5">
                <div class="col-md-4 text-center">
                    <h1><i class="bi bi-wifi-off font-error"></i></h1>
                    <h1 class="display-1 fw-bold">503</h1>
                    <h2>Service Unavailable</h2>
                    <p class="text-muted">
                        <strong>
                           The server is temporary busy, try again later!
                        </strong>
                    </p>
                    <p>
                        <router-link to="/">
                            Go back
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
</template>
<script>
    export default {
        mounted() {
            document.title = '503 Service Unavailable | ' + process.env.VUE_APP_TITLE
        },
        data(){
            return {
                site_title: process.env.VUE_APP_TITLE
            }
        }
    }
</script>