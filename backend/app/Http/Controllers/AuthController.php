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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'forgotPassword', 'resetPassword', 'confirm', 'refresh', 'logout']]);
    }

    public function login(Request $request)
    {

        $email = $request->get("email");
        $password = $request->get("password");
        $remember = $request->get("remember", false);
        $user = User::where("email", $email)->first();

        if(is_null($user)){
            $response = array("message"=> "These credentials do not match our records.");
            return response()->json($response, 400);
        }

        $status = (int) $user->status;

        if($status == 0){
            $response = array("message"=> "You need to confirm your account. We have sent you an activation code, please check your email.!");
            return response()->json($response, 400);
        }

        $hashedPassword = $user->password;
        if (!Hash::check($password, $hashedPassword)) {
            $response = array("message"=> "Incorrect password please try again !!");
            return response()->json($response, 400);
        }

        if($remember){
            $user->remember_token = Str::random(50);
            $user->save();
        }else{
            $user->remember_token = null;
            $user->save();
        }

        $credentials = $request->only(['email', 'password']);
        $token = Auth::attempt($credentials);
        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $email = $request->get("email");
        $password = $request->get("password");
        $user = User::where("email", $email)->first();

        if(!is_null($user)){
            $response = array("message"=> "The email address has already been taken.!");
            return response()->json($response, 400);
        }

        $token = md5(Str::random(100));
        $newUser = new User();
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->status = 1;
        $newUser->confirm_token = $token;
        $newUser->save();

        return response()->json($newUser);
    }

    public function forgotPassword(Request $request)
    {
        $email = $request->get("email");
        $user = User::where("email", $email)->first();

        if(is_null($user)){
            $response = array("message"=> "We can't find a user with that e-mail address or password reset token is invalid.!");
            return response()->json($response, 400);
        }

        $token = md5(Str::random(100));
        $user->reset_token = $token;
        $user->save();

        $response = array("message"=> "We have e-mailed your password reset link!", "token"=> $token);
        return response()->json($response);
    }

    public function resetPassword($token, Request $request)
    {
        $email = $request->get("email");
        $password = $request->get("password");
        $user = User::where("email", $email)->first();

        if(is_null($user)){
            $response = array("message"=> "We can't find a user with that e-mail address or password reset token is invalid.!");
            return response()->json($response, 400);
        }

        if($user->reset_token != $token){
            $response = array("message"=> "We can't find a user with that  token is invalid.!");
            return response()->json($response, 400);
        }

        $user->password = Hash::make($password);
        $user->reset_token = null;
        $user->save();

        $response = array("message"=> "Your password has been reset!");
        return response()->json($response);

    }

    public function confirm($token)
    {
        $user = User::where("confirm_token", $token)->first();

        if(is_null($user)){
            $response = array("message"=> "We can't find a user with that  token is invalid.!");
            return response()->json($response, 400);
        }

        $status = (int) $user->status;

        if($status == 1){
            $response = array("message"=> "Your e-mail is already verified. You can now login.");
            return response()->json($response);
        }else{
            $user->status = 1;
            $user->save();
            $response = array("message"=> "Your e-mail is verified. You can now login.");
            return response()->json($response);
        }

    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user(),
            'expires_in' => auth()->factory()->getTTL() * 60 * 24
        ]);
    }
}
