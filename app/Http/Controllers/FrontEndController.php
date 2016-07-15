<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FrontEndController extends Controller
{
    public function index($type=null)
    {
        return view('frontend.index',['type'=>$type]);
    }
}
