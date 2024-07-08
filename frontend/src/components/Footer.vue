<template>
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; <i class="bi bi-building-check me-1"></i>{{siteTitle}} {{year}}</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                siteTitle: process.env.VUE_APP_TITLE,
                year: new Date().getFullYear()
            }
        }
    }
</script>