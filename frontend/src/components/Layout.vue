<template>
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <Navigation></Navigation>
        </nav>
        <router-view />
    </main>
    <!-- Footer-->
    <footer class="bg-primary py-4 mt-auto footer">
        <Footer></Footer>
    </footer>
</template>
<script>
    import Footer from "./Footer.vue"
    import Navigation from "./Navigation.vue"
    export default {
        components: { Footer, Navigation }
    }
</script>