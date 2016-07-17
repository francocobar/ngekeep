<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddTaskRequest;
use Auth;
use App\User;
use App\Task;
use App\TaskDetail;
use App\Http\Controllers\ServicesController;
use Carbon\Carbon;
class TasksController extends Controller
{
    public function index() {
    	return view('dashboard.tasks.index',[
    			'title' => 'Tasks',
    		]);
    }

    public function addTaskView() {
    	return view('dashboard.tasks.add',[
    			'title' => 'Tasks',
    			'title2' => 'Add',
    		]);    	
    }

    public function addTaskSubmit(AddTaskRequest $request) {
        $data = $request->all();
        $lists = explode(',',$data['assignedTo']);
        $reLists = array();

        $doesNotExist = "";
        foreach($lists as $username) {
            if(trim($username)) {
                $findUser = User::where('username', trim($username))->first();
                if($findUser) {
                    $reLists[] = $findUser->id;
                }
                else $doesNotExist = $doesNotExist.', '.trim($username);
            }
        }

        if($doesNotExist) {
            return response()->json(['assignedToUsernames'=>['The following username does not exist: '.substr($doesNotExist, 2)]], 422);
        }
        
        //create new task
        $newTask = new Task();
        $newTask->title = $data['title'];
        $newTask->description = $data['description'];
        $newTask->created_by = Auth::user()->id;
        $newTask->url_salt = ServicesController::generateSalt(6);
        if($newTask->save()) {
            foreach(array_unique($reLists) as $assignedToId) {
                $taskDetail = new TaskDetail();
                $taskDetail->task_id_fk = $newTask->id;
                $taskDetail->assigned_to = $assignedToId;
                $taskDetail->save();
            }
        }

        return response()->json(['status'=>true,'needreload'=>true,'message'=>'task successfully added...']);
    }

    public function myTask() {
        $listTaskDetail = TaskDetail::where('assigned_to', Auth::user()->id)->orderBy('created_at','DESC')->get();
        $return = array();
        foreach ($listTaskDetail as $taskDetail) {
            $taskDetail['assigned_date'] = ServicesController::parseDate($taskDetail->task->creted_at, 1);
            //$task['title'] = $taskDetail->task->title;
            // $task['description'] = $taskDetail->task->description;
            // $task['requested_by'] = $taskDetail->task->user->name;
            $url['id'] = $taskDetail->task->id;
            $url['url_salt'] = $taskDetail->task->url_salt;
            $url['my_id'] = Auth::user()->id;

            if($taskDetail->status ==0 || $taskDetail->status ==1) {
                $taskDetail['action'] = 'start';
            }
            else if($taskDetail->status == 2) {
                $taskDetail['action'] = 'finish';
            }
            $taskDetail['is_unread'] = $taskDetail->status == 0 ? "<i style='color:green;'>New</i>" : '';
            $taskDetail['url_rewrite'] = $taskDetail['action'].'/'.ServicesController::encrypt($url);
            $return[] = $taskDetail;

            if($taskDetail->status ==0) {
                TaskDetail::where('assigned_to', Auth::user()->id)
                                ->where('task_id_fk', $taskDetail->task_id_fk)
                                ->update(['status'=> 1]);
            }
        }
        // dd($return);
        return view('dashboard.tasks.list',['list'=>$return, 'title'=>'Tasks', 'title2' =>'My Tasks']);
    }

    public function myRequest() {
        return view('dashboard.tasks.myrequest',['title'=>'Tasks', 'title2' =>'My Request']);

    }

    public function taskAction($action, $encryptedValue) {
        $url = ServicesController::decrypt($encryptedValue);
        if($url != "ERROR") {
            $task = Task::find($url['id']);

            if($task != null && $url['my_id'] == Auth::user()->id && $task->url_salt == $url['url_salt']) {
              if($action == 'start') {
                $taskDetails = TaskDetail::where('task_id_fk', $url['id'])->where('status','<',2)->update(['status'=>2]);

                //return response()->json(['status' => true, 'nextaction' => 'finish']);
              }
              else if($action == 'finish') {
                $taskDetails = TaskDetail::where('task_id_fk', $url['id'])->where('status','<',3)->update(['status'=>3]);

                //return response()->json(['status' => true, 'nextaction' => '']);
              }

              if($taskDetails) return redirect()->route('MyTask');;
            }
        }

        abort(404);
    }
}
