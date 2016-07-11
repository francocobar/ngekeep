<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackEndController extends Controller
{
    public function index() {
    	return view('masterpage.dashboard');
    }
}
