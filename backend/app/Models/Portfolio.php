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

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Reference;
use App\Models\PortfolioImage;

class Portfolio extends Model
{
    protected $table = "portfolios";

    protected $fillable = [
        "customer_id",
        "reference_id",
        "title",
        "description",
        "project_date",
        "project_url",
        "status",
        "sort"
    ];

    public function Customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function Reference() {
        return $this->belongsTo(Reference::class, 'reference_id');
    }

    public function Image() {
        return $this->hasMany(PortfolioImage::class);
    }

    public static function InitialCreate()
    {
        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            for($i = 1; $i <= 9; $i++)
            {
                $faker = Faker::create();
                $category = Reference::where("type", 3)->inRandomOrder()->first();
                $customer = Customer::whereNotNull("id")->inRandomOrder()->first();

                $portfolio = self::create([
                    "customer_id"=> $customer->id,
                    "reference_id"=> $category->id,
                    "title"=> $faker->catchPhrase,
                    "description"=> $faker->text,
                    "project_date"=> $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', 'Asia/Jakarta'),
                    "project_url"=> $faker->url,
                    "status"=> 1,
                    "sort"=> $i
                ]);

                for($j = 1; $j <= 5; $j++){
                    PortfolioImage::create([
                        "portfolio_id"=> $portfolio->id,
                        "status"=> $j == 1 ? 1 : 0
                    ]);
                }

            }
        }
    }

}
