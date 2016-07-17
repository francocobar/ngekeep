@extends('masterpage.dashboard')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Add Task</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Assigned Date</th>
                <th>Title</th>
                <!-- <th>Desc</th> -->
                <th>Requested by</th>
                <!-- <th>Assigned to</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $task)
              <tr>
                <td>{{ $task['assigned_date'] }} {!!$task['is_unread']!!}</td>
                <td>{{ $task->task->title }}</td>
                <!-- <td>{{ $task['description'] }}</td> -->
                <td>{{ $task->task->user->name }}</td>
                <!-- <td></td> -->
                <td><a href="{{$task['url_rewrite']}}" class="taskAction">{{$task['action']}}</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection