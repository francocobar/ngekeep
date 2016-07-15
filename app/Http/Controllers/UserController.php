<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\ServicesController;
use App\User;
use Auth;

class UserController extends Controller
{
    public function register(RegisterRequest $request) 
    {
      $data = $request->all();
      $createUser = User::create([
          'name' => $data['fullName'],
          'email' => $data['email'],
          'activation_salt' => ServicesController::generateSalt(5),
          'password' => bcrypt($data['password']),
      ]);

      if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
          ServicesController::sendEmailActivation(Auth::user());
          return response()->json(['status'=>true,'url'=>route('DashboardHome')]);
      }
    }

    public function login(LoginRequest $request) 
    {
      $data = $request->all();
      if (Auth::attempt(['email' => $data['inputEmail'], 'password' => $data['inputPassword']])) {
          return response()->json(['status'=>true,'url'=>route('DashboardHome')]);
      }
      $user = User::where('email',$data['inputEmail'])->first();

      if($user)
        return response()->json(['password'=>['The password that you\'ve entered is incorrect.']], 422);

      return response()->json(['inputEmail'=>['The email address that you\'ve entered doesn\'t match any account.']], 422);
    }

    public function activate($encryptedValue) 
    {
      $data = ServicesController::decrypt($encryptedValue);
      if($data != "ERROR") {
        $user = User::where('email', $data['email'])->first();

        if($user != null && !$user->activated && $user->activation_salt == $data['activation_salt']) {
          $user->activated = true;
          $user->save();
          return view('frontend.activationsuccessful');
        }
      }

      return "404";

    }

    public function activationreminder()
    {
      if(Auth::user() && !Auth::user()->activated)
      {
        return view('frontend.activationreminder');
      }
      abort(404);
    }

    public function checkUsername($username)
    {
      return response()->json(['status' => false]);
    }
}
