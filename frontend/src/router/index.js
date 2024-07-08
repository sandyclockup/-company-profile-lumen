/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto.dev@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

import { createWebHistory, createRouter } from "vue-router";
import Layout from "@/components/Layout.vue";
import Home from "@/pages/Home.vue";
import About from "@/pages/About.vue";
import Contact from "@/pages/Contact.vue";
import Faq from "@/pages/Faq.vue";
import PortfolioList from "@/pages/portfolio/List.vue";
import PortfolioDetail from "@/pages/portfolio/Detail.vue";
import ArticleList from "@/pages/article/List.vue";
import ArticleDetail from "@/pages/article/Detail.vue";
import Service from "@/pages/Service.vue";
import AccountPassword from "@/pages/account/Password.vue"
import AccountProfile from "@/pages/account/Profile.vue"
import AuthLogin from "@/pages/auth/Login.vue"
import AuthRegister from "@/pages/auth/Register.vue"
import AuthForgotPassword from "@/pages/auth/ForgotPassword.vue"
import AuthResetPassword from "@/pages/auth/ResetPassword.vue"
import Error from "@/pages/Error.vue";
import Unavailable from "@/pages/Unavailable.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { layout: Layout },
  },
  {
    path: "/about",
    name: "About",
    component: About,
    meta: { layout: Layout },
  },
  {
    path: "/Contact",
    name: "contact",
    component: Contact,
    meta: { layout: Layout },
  },
  {
    path: "/faq",
    name: "Faq",
    component: Faq,
    meta: { layout: Layout },
  },
  {
    path: "/portfolio",
    name: "portfolioList",
    component: PortfolioList,
    meta: { layout: Layout },
  },
  {
    path: "/portfolio/:id",
    name: "portfolioDetail",
    component: PortfolioDetail,
    meta: { layout: Layout },
  },
  {
    path: "/article",
    name: "articleList",
    component: ArticleList,
    meta: { layout: Layout },
  },
  {
    path: "/article/:slug",
    name: "articleDetail",
    component: ArticleDetail,
    meta: { layout: Layout },
  },
  {
    path: "/service",
    name: "Service",
    component: Service,
    meta: { layout: Layout },
  },
  {
    path: "/account/profile",
    name: "accountProfile",
    component: AccountProfile,
    meta: { layout: Layout },
  },
  {
    path: "/account/password",
    name: "accountPassword",
    component: AccountPassword,
    meta: { layout: Layout },
  },
  {
    path: "/auth/login",
    name: "authLogin",
    component: AuthLogin,
    meta: { layout: Layout },
  },
  {
    path: "/auth/register",
    name: "authRegister",
    component: AuthRegister,
    meta: { layout: Layout },
  },
  {
    path: "/auth/email/forgot",
    name: "authEmailForgot",
    component: AuthForgotPassword,
    meta: { layout: Layout },
  },
  {
    path: "/auth/email/reset/:token",
    name: "authEmailReset",
    component: AuthResetPassword,
    meta: { layout: Layout },
  },
  {
    path: "/:pathMatch(.*)*",
    name: "Layout",
    component: Error,
    meta: { layout: Layout }
  },
  {
    path: "/unavailable",
    name: "Unavailable",
    component: Unavailable,
    meta: { layout: Layout },
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
