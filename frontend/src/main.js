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

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";
import "@popperjs/core";
import "floating-vue/dist/style.css";
import 'vue3-carousel/dist/carousel.css'
import "./assets/style.css";
import FloatingVue from "floating-vue";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

router.beforeEach(() => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

createApp(App).use(FloatingVue).use(router).mount("#app");
