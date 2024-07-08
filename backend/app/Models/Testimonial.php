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
use App\Models\Customer;

class Testimonial extends Model
{
    protected $table = "testimonials";

    protected $fillable = [
        "customer_id",
        "image",
        "name",
        "position",
        "quote",
        "status",
        "sort"
    ];

    public function Customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public static function InitialCreate()
    {
        $customers = Customer::whereNotNull("id")->get();
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            foreach($customers as $index => $customer)
            {
				$sort = $index + 1;
                $faker = Faker::create();
                self::create([
                    "customer_id"=> $customer->id,
                    "name"=> $faker->name,
                    "position"=> $faker->jobTitle,
                    "quote"=> $faker->text,
                    "status"=> 1,
                    "sort"=> $sort
                ]);
            }
        }
    }

}
