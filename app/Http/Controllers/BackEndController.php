<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\TaskDetail;

class BackEndController extends Controller
{
    public function index() {
        $newTask = TaskDetail::where('assigned_to', Auth::user()->id)
        					->where('status',0)
        					->get();

    	$count = $newTask->count();
        if($count > 0) {
        	if($count == 1) {
    			$label = 'New Task!';
        	}
        	else if($count > 1) {
    			$label = 'New Tasks!';
        	}
        }
        else {
        	$allMyTask = TaskDetail::where('assigned_to', Auth::user()->id)
        					->get();
			$count = $allMyTask->count();
        	if($count <= 1) {
    			$label = 'Task!';
        	}
        	else if($count > 1) {
    			$label = 'Tasks!';
        	}
        }
    	return view('dashboard.index',['count' => $count, 'label' => $label]);
    }

    public function myUsername() {
    	if(!Auth::user()->username) {
    		return view('dashboard.setusername',['title'=>'Account', 'title2' =>'Set My Username']);
    	}
    	return view('dashboard.myusername',['title'=>'Account', 'title2' =>'My Username']);
    }
}
