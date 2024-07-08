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

    list() {
        return db().get("portfolio/list")
    },

    detail(id) {
        return db().get("portfolio/detail/" + id)
    },
}