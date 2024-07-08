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

class Slider extends Model
{
    protected $table = "sliders";

    protected $fillable = [
        "image",
        "title",
        "description",
        "link",
        "status",
        "sort"
    ];

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            for($i = 1; $i <=5; $i++)
            {
                $faker = Faker::create();
                self::create([
                    "title"=> $faker->sentence(5),
                    "description"=> $faker->text,
                    "status"=> 1,
                    "sort"=> $i
                ]);
            }
        }
    }

}
