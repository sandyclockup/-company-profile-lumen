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

    ping(){
        return db().get("page/ping")
    },

    home(){
        return db().get("page/home")
    },

    about(){
        return db().get("page/about")
    },

    service(){
        return db().get("page/service")
    },
    
    faq(){
        return db().get("page/faq")
    },

    contact(data){
        return db().get("page/contact", data)
    },

    message(data){
        return db().post("page/message", data)
    },

    subscribe(data){
        return db().post("page/subscribe", data)
    }

}