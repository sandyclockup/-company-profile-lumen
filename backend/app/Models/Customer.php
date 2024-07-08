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
use App\Models\Portfolio;
use App\Models\Testimonial;

class Customer extends Model
{
    protected $table = "customers";

    protected $fillable = [
        "image",
        "name",
        "email",
        "phone",
        "address",
        "sort",
        "status"
    ];

    public function Portfolio() {
        return $this->hasMany(Portfolio::class);
    }

    public function Testimonial() {
        return $this->hasMany(Testimonial::class);
    }

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            for($i = 1; $i <= 10; $i++)
            {
                $faker = Faker::create();
                self::create([
                    "name"=> $faker->company,
                    "email"=> $faker->email,
                    "phone"=> $faker->phoneNumber,
                    "address"=> $faker->address,
                    "sort"=> $i,
                    "status"=> 1
                ]);
            }
        }
    }

}
