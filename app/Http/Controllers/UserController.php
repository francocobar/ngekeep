<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\User;
use Auth;

class UserController extends Controller
{
    public function register(RegisterRequest $request) {
      $data = $request->all();
      $createUser = User::create([
          'name' => $data['fullName'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);

      if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
          return response()->json(['status'=>'success','url'=>route('timeoff').'#policy']);
      }
    }

    public function login(LoginRequest $request) {
      $data = $request->all();
      if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
          return response()->json(['status'=>'success','url'=>route('timeoff').'#policy']);
      }
    }
}
