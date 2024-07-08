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
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Team;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Contact;
class PageController extends BaseController
{

    public function ping()
    {
        return response()->json([true]);
    }

    public function home()
    {
        $faker = Faker::create();
        $response = array(
            "header"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->sentence(20)
            ),
            "sliders"=> Slider::select(["id","title", "description"])->where("status", 1)->orderBy("sort")->get(),
            "services"=> Service::select(["id", "icon", "title", "description"])->where("status", 1)->take(4)->inRandomOrder()->get(),
            "testimonial"=> Testimonial::select(["name", "position", "quote", "customer_id"])->with('customer')->where("status", 1)->inRandomOrder()->first(),
            "articles"=> Article::where("status", 1)->with('user')->with('references')->take(3)->inRandomOrder()->get(),
        );
        return response()->json($response);
    }

    public function about()
    {
        $faker = Faker::create();
        $response = array(
            "header"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->sentence(20)
            ),
            "section1"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "section2"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "teams"=> Team::select(["id","name", "position_name"])->where("status", 1)->inRandomOrder()->get(),
        );
        return response()->json($response);
    }

    public function service()
    {
        $faker = Faker::create();
        $response = array(
            "header"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "services"=> Service::select(["id", "icon", "title", "description"])->where("status", 1)->inRandomOrder()->get(),
            "customers"=> Customer::select(["id", "name", "email", "address"])->where("status", 1)->inRandomOrder()->get(),
            "testimonials"=> Testimonial::select(["name", "position", "quote"])->where("status", 1)->inRandomOrder()->get(),
        );
        return response()->json($response);
    }

    public function faq()
    {
        $response = array(
            "faqs1"=> Faq::select(["id", "question", "answer"])->where("status", 1)->where("sort", "<=", 5)->inRandomOrder()->get(),
            "faqs2"=> Faq::select(["id", "question", "answer"])->where("status", 1)->where("sort", ">", 5)->inRandomOrder()->get()
        );
        return response()->json($response);
    }

    public function contact()
    {
        $response = array(
            "services"=> Service::select(["id", "icon", "title", "description"])->where("status", 1)->take(4)->inRandomOrder()->get(),
        );
        return response()->json($response);
    }

    public function message(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->get("name");
        $contact->email = $request->get("email");
        $contact->subject = $request->get("subject");
        $contact->message = $request->get("message");
        $contact->status = 0;
        $contact->save();
        return response()->json($contact);
    }

    public function subscribe(Request $request)
    {
        $response = array();
        return response()->json($response);
    }

    public function file($name){
        $file_path = storage_path('files') . '/' . $name;
        if (file_exists($file_path)) {
            $file = file_get_contents($file_path);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
        }else{
            $response = array();
            $response['success'] = false;
            $response['message'] = "Avatar not found";
            return response()->json($response);
        }
    }

}
