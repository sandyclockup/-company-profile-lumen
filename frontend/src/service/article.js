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

    list(data){
        return db().get("article/list", { params : data })
    },

    detail(slug){
        return db().get("article/detail/"+slug)
    },

    commentList(id){    
        return db().get("article/comment/list/"+id)
    },

    commentCreate(id, data){
        return db().post("article/comment/create/"+id, data)
    },

}