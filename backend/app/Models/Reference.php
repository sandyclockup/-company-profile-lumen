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
use App\Helpers\MyHelper;
use App\Models\Portfolio;
use App\Models\Article;

class Reference extends Model
{
    const TYPE_ARTICLE_CATEGORY = 1;
    const TYPE_ARTICLE_TAG = 2;
    const TYPE_PORTFOLIO_CATEGORY = 3;

    protected $table = "references";

    protected $fillable = [
        "slug",
        "name",
        "description",
        "type",
        "status"
    ];

    public function Portfolio() {
        return $this->hasMany(Portfolio::class);
    }

    public function Articles() {
        return $this->belongsToMany(Article::class, "articles_references");
    }

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            $articles = [
                "Health and wellness",
                "Technology and gadgets",
                "Business and finance",
                "Travel and tourism",
                "Lifestyle and fashion"
            ];

            $tags = [
                "Mental Health",
                "Fitness and Exercise",
                "Alternative Medicine",
                "Artificial Intelligence",
                "Network Security",
                "Cloud Computing",
                "Entrepreneurship",
                "Personal Finance",
                "Marketing and Branding",
                "Travel Tips and Tricks",
                "Cultural Experiences",
                "Destination Guides",
                "Beauty and Fashion Trends",
                "Celebrity News and Gossip",
                "Parenting and Family Life",
            ];

            $portfolios = [
                "3D Modeling",
                "Web Application",
                "Mobile Application",
                "Illustrator Design",
                "UX Design"
            ];

            foreach($articles as $article){
                self::create([
                    "slug"=> MyHelper::strToSlug($article),
                    "name"=> $article,
                    "type"=> self::TYPE_ARTICLE_CATEGORY,
                    "status"=> 1
                ]);
            }

            foreach($tags as $tag){
                self::create([
                    "slug"=> MyHelper::strToSlug($tag),
                    "name"=> $tag,
                    "type"=> self::TYPE_ARTICLE_TAG,
                    "status"=> 1
                ]);
            }

            foreach($portfolios as $portfolio){
                self::create([
                    "slug"=> MyHelper::strToSlug($portfolio),
                    "name"=> $portfolio,
                    "type"=> self::TYPE_PORTFOLIO_CATEGORY,
                    "status"=> 1
                ]);
            }

        }
    }

}