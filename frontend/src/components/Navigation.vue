<template>
    <div class="container px-5">
        <router-link to="/" class="navbar-brand"><i class="bi bi-building-check me-2"></i>{{ site_title }}</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link to="/" @click="setActive('home')"
                        :class="active === 'home' ? 'nav-link active' : 'nav-link'">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/about" @click="setActive('about')"
                        :class="active === 'about' ? 'nav-link active' : 'nav-link'">About</router-link>
                </li>
                 <li class="nav-item">
                    <router-link to="/service" @click="setActive('service')"
                        :class="active === 'service' ? 'nav-link active' : 'nav-link'">Service</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/portfolio" @click="setActive('portfolio')"
                        :class="active === 'portfolio' ? 'nav-link active' : 'nav-link'">Portfolio</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/article" @click="setActive('article')"
                        :class="active === 'article' ? 'nav-link active' : 'nav-link'">Article</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/faq" @click="setActive('faq')"
                        :class="active === 'faq' ? 'nav-link active' : 'nav-link'">FAQ</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/contact" @click="setActive('contact')"
                        :class="active === 'contact' ? 'nav-link active' : 'nav-link'">Contact</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="accountDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                       <template v-if="!auth">
                            <li>
                                <router-link to="/auth/login" @click="setActive('auth')" class="dropdown-item">
                                    <i class="bi bi-lock me-2"></i>Login
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/auth/register" @click="setActive('auth')" class="dropdown-item">
                                    <i class="bi bi-person me-2"></i>Register
                                </router-link>
                            </li>
                       </template>
                       <template v-else>
                            <li>
                                <router-link to="/account/password" @click="setActive('account')" class="dropdown-item">
                                    <i class="bi bi-lock me-2"></i>Change Password
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/account/profile"  @click="setActive('account')"  class="dropdown-item">
                                    <i class="bi bi-person me-2"></i>Manage Profile
                                </router-link>
                            </li>
                            <li>
                                <a href="#"  class="dropdown-item" @click.prevent="logout()">
                                    <i class="bi bi-power me-2"></i>Log Out
                                </a>
                            </li>
                       </template>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    import authService from "@/service/auth"
    export default {
        methods: {
            setActive: function (menu) {
                localStorage.setItem('active-menu', menu)
                this.active = menu
            },
            async logout(){
               await authService.logout().then(()=> {
                   localStorage.setItem('active-menu', 'home')
                   localStorage.removeItem("token")
                   this.active = 'home'
                   setTimeout(() => { 
                        window.location.href = "/"
                    }, 1500)
               })
            }
        },
        data(){
            return {
                active: localStorage.getItem('active-menu') || 'home',
                site_title: process.env.VUE_APP_TITLE,
                auth: localStorage.getItem("token") !== null
            }
        }
    }
</script>