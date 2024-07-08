<?php

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

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\User;

class ArticleComment extends Model
{
    protected $table = "articles_comments";

    protected $fillable = [
        "parent_id",
        "article_id",
        "user_id",
        "comment"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Article() {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public static function buildComment($article_id)
    {
        $elements = self::where("article_id", $article_id)->with('user')->orderBy("id", "DESC")->get()->toArray();
        return self::buildTree($elements, 0);
    }

    private static function buildTree(array &$elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }else{
                    $element['children'] = [];
                }
                $branch[] = $element;
                unset($elements[$element['id']]);
            }
        }
        return $branch;
    }

}
