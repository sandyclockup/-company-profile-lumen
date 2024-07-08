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

import db from "@/db"

export default {

    login(data) {
        return db().post("auth/login", data)
    },

    register(data) {
        return db().post("auth/register", data)
    },

    forgotPassword(data) {
        return db().post("auth/email/forgot", data)
    },

    resetPassword(token, data) {
        return db().post("auth/email/reset/" + token, data)
    },

    confirm(token) {
        return db().post("auth/confirm/" + token)
    },

    logout() {
        return db().post("auth/logout")
    },

    refresh() {
        return db().post("auth/refresh")
    }

}