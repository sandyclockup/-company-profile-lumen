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

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Portfolio;
use App\Models\PortfolioImage;

class PortfolioController extends BaseController
{
    public function list()
    {
        $response = array(
            "portfolios"=> Portfolio::where("status", 1)->orderBy("sort")->get()
        );
        return response()->json($response);
    }

    public function detail($id)
    {

        $portfolio = Portfolio::where("id", $id)->first();
        if(is_null($portfolio)){
            $response = array("message"=> "The record with id ".$id." was not found in our record !!");
            return response()->json($response, 400);
        }

        $response = array(
            "portfolio"=> $portfolio,
            "images"=> PortfolioImage::where("portfolio_id", $id)->orderBy("id", "DESC")->get()
        );
        return response()->json($response);
    }

}
