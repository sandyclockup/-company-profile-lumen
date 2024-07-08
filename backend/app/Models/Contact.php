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

class Contact extends Model
{
    protected $table = "contacts";

    protected $fillable = [
        "name",
        "email",
        "subject",
        "message",
        "status"
    ];

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            for($i = 1; $i <= 10; $i++)
            {
                $faker = Faker::create();
                self::create([
                    "name"=> $faker->name,
                    "email"=> $faker->email,
                    "subject"=> $faker->sentence(5),
                    "message"=> $faker->text,
                    "status"=> 0
                ]);
            }
        }
    }

}