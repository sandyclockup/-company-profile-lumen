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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AccountController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function detailProfile()
    {
        $user = Auth::User();
        return response()->json($user);
    }

    public function uploadPicture(Request $request)
    {
        $user = Auth::User();
        $dirUpload = storage_path('files');

        if(!is_dir($dirUpload)){
            @mkdir($dirUpload);
        }

        $image = md5(Str::random(34));
        if($request->file('image')){
            $upload = $request->file('image')->move($dirUpload, $image);
            if($upload){

                if(!is_null($user->image)){
                    $currentUpload = $dirUpload."/".$user->image;
                    if(file_exists($currentUpload)){
                        unlink($currentUpload);
                    }
                }

                $user->image = $image;
                $user->save();
            }
        }   

        return response()->json(["message"=> "Yor profile picture has been changed !!", "image"=> $image]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::User();
        $email = $request->get("email");
        $phone = $request->get("phone");

        $checkUserEmail = User::where("email", $email)->where("id", "!=", $user->id)->first();
        $checkUserPhone = User::where("phone", $phone)->where("id", "!=", $user->id)->first();

        if(!is_null($checkUserEmail)){
            return response()->json(["message"=> "The email address has already been taken.!"], 400);
        }

        if(!is_null($checkUserPhone)){
            return response()->json(["message"=> "The phone number has already been taken.!"], 400);
        }

        $user->email = $email;
        $user->phone = $phone;
        $user->first_name = $request->get("first_name");
        $user->last_name = $request->get("last_name");
        $user->gender = $request->get("gender");
        $user->country = $request->get("country");
        $user->address = $request->get("address");
        $user->about_me = $request->get("about_me");
        $user->save();

        return response()->json(["message"=> "Yor profile has been changed !!"]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::User();
        $current_password = $request->get("current_password");
        $password = $request->get("password");

        $hashedPassword = $user->password;
        if (!Hash::check($current_password, $hashedPassword)) {
            return response()->json(["message"=> "Incorrect current password please try again !!"], 400);
        }

        $user->password = Hash::make($password);
        $user->save();

        return response()->json(["message"=> "Your password has been reset!"]);
    }

}
