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
use App\Models\Portfolio;

class PortfolioImage extends Model
{
    protected $table = "portfolios_images";

    protected $fillable = [
        "portfolio_id",
        "image",
        "status"
    ];

    public function Portfolio() {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

}