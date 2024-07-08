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
use Faker\Factory as Faker;

class Team extends Model
{
    protected $table = "teams";

    protected $fillable = [
        "image",
        "name",
        "email",
        "phone",
        "position_name",
        "sort",
        "twitter",
        "facebook",
        "instagram",
        "linked_in",
        "address",
        "status"
    ];

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            for($i = 1; $i <=10; $i++)
            {
                $faker = Faker::create();
                self::create([
                    "name"=> $faker->name,
                    "email"=> $faker->email,
                    "phone"=> $faker->phoneNumber,
                    "position_name"=> $faker->jobTitle,
                    "sort"=> $i,
                    "twitter"=> MyHelper::strToSlug($faker->name),
                    "facebook"=> MyHelper::strToSlug($faker->name),
                    "instagram"=> MyHelper::strToSlug($faker->name),
                    "linked_in"=> MyHelper::strToSlug($faker->name),
                    "address"=> $faker->address,
                    "status"=>1
                ]);
            }
        }
    }

}
