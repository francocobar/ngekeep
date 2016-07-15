<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class BackEndController extends Controller
{
    public function index() {
    	return view('masterpage.dashboard');
    }

    public function myUsername() {
    	if(!Auth::user()->username) {
    		return view('dashboard.setusername',['title'=>'Account', 'title2' =>'Set My Username']);
    	}
    	return "ada";
    }
}
