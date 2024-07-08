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
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Reference;
use App\Models\ArticleComment;
use App\Helpers\MyHelper;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = [
        "user_id",
        "image",
        "title",
        "description",
        "content",
        "status",
        "sort"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function References() {
        return $this->belongsToMany(Reference::class, "articles_references");
    }

    public function Comment() {
        return $this->hasMany(ArticleComment::class);
    }

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            $users = User::whereNotNull("id")->get();
            foreach($users as $index => $user)
            {
                $number = $index + 1;
                $faker = Faker::create();
                $title = $faker->sentence(10);
                $slug = MyHelper::strToSlug($title);
                $article = self::create([
                    "user_id"=> $user->id,
                    "title"=> $title,
                    "slug"=> $slug,
                    "description"=> $faker->sentence(20),
                    "content"=> $faker->text,
                    "status"=> 1
                ]);

                for($j = 1; $j <= 3; $j++)
                {
                    $category = Reference::where("type", 1)->inRandomOrder()->first();
                    $article->References()->sync([$category->id]);
                }

                for($k = 1; $k <= 5; $k++)
                {
                    $tag = Reference::where("type", 2)->inRandomOrder()->first();
                    $article->References()->sync([$tag->id]);
                }

                $comments =  User::where("id", "!=", $user->id)->inRandomOrder()->take(2)->get();
                foreach($comments as $comment){
                    ArticleComment::create([
                        "article_id"=> $article->id,
                        "user_id"=> $comment->id,
                        "comment"=> $faker->text
                    ]);
                }

            }
        }
    }


}
