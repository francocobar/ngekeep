<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Hash;
use Crypt;
use Mail;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;

class ServicesController extends Controller
{
  
    public static function generateSalt($length = 10) 
    {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    if($length%2==1) {
	    	$characters = Hash::make($characters);
	    }
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
    	return $randomString;
    }

    public static function encrypt($decryptedValue) 
    {
    	return Crypt::encrypt($decryptedValue);
    }

    public static function decrypt($encryptedValue) 
    {
		try {
		    $decrypted = Crypt::decrypt($encryptedValue);
		} catch (DecryptException $e) {
		    $decrypted = "ERROR";
		}

		return $decrypted;
    }

    public static function sendEmailActivation($user) 
    {
    	$data['email'] = $user->email;
    	$data['activation_salt'] = $user->activation_salt;
    	$activationLink = env('APP_URL').'activate/'.ServicesController::encrypt($data);
	    Mail::send('emails.activation', ['activationLink'=>$activationLink], function ($message) use ($user) {

	        $message->from('ngekeep@gmail.com', 'NgeKEEP - No Reply');

	        $message->to($user->email, $user->name)->subject('NgeKEEP Account Activation');

	    });
    }

    public function testing()
    {
    	return view('frontend.activationsuccessful');
    	return route('FrontEndHomeWithType', ['type' => 'login']);
    }

    public static function parseDate($date,$format=0)
    {
      $temp = Carbon::parse($date);
      if($format==0) return $temp->format('D, d F Y'); // Wednesday, 03 August 1975
      else if($format==1) return $temp->format('Y-m-d');
    }
}
