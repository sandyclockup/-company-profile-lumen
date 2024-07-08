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

    profileDetail(){
        return db().get("account/profile/detail")
    },

    profileUpdate(data){
        return db().post("account/profile/update", data)
    },

    passwordUpdate(data){
        return db().post("account/password/update", data)
    },

    profileUpload(data){
        return db(true).post("account/profile/upload", data)
    },

}