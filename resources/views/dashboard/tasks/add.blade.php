@extends('masterpage.dashboard')

@section('content')
<div class="row">
	<div class="col-lg-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title"><i class="fa fa-plus fa-fw"></i> Add Task</h3>
	        </div>
	        <div class="panel-body">
				{!! Form::open(array('url' => route('AddTaskSubmit'), 'class' => 'form-horizontal')) !!}					
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="title">Title:</label>
				    <div class="col-sm-10">
				      {{ Form::text('title', null, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Title', 'required' =>'', 'autofocus' => '')) }}
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="description">Description:</label>
				    <div class="col-sm-10"> 
				      {{ Form::textarea('description', null, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'description', 'required' =>'', 'autofocus' => '')) }}
				    </div>
				  </div>				
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="requestedBy">Reqeusted by:</label>
				    <div class="col-sm-10">
				      {{ Form::text('requestedBy', Auth::user()->name.' ('.Auth::user()->username.')', array('id' => 'requestedBy', 'class' => 'form-control', 'disabled' => '')) }}
				    </div>
				  </div>
				  <div class="form-group"> 
				    <label class="control-label col-sm-2" for="requestedBy">Assigned to:</label>
				    <div class="col-sm-10">
				      <div class="checkbox">
				        <label><input type="checkbox" id="assignedToMe" name="assignedToMe" value="{{Auth::user()->username}}"> me ({{Auth::user()->username}})</label>
				      </div>
				    </div>
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label><input type="checkbox" id="assignedToOthers" name="assignedToOthers"> others</label>
				      </div>
				    </div>
				    <div class="col-sm-offset-2 col-sm-10">
				    	{{ Form::text('assignedToUsernames', null, array('id' => 'assignedToUsernames', 'class' => 'form-control', 'placeholder' => 'Type one or more usernames who want assigned', 'required' =>'', 'autofocus' => '', 'disabled' => '')) }}
				    </div>
				    <div class="col-sm-offset-2 col-sm-10 form-help-text" for="info">
				    	For more than one, separate the usernames with a comma!
				    </div>
				    <input type="hidden" id="assignedTo" name="assignedTo" />
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				    	<ul class="messages"></ul>
				    </div>
				    <div class="col-sm-offset-2 col-sm-10">
				      {{ Form::submit('Add', array('id'=>'addTask', 'class' => 'btn blue'))}}
				    </div>
				  </div>
				</form>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('headOptional')
<script src="http://malsup.github.io/jquery.blockUI.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#assignedToOthers').click(function() {
			$('#assignedToUsernames').prop('disabled', !$(this).is(':checked'));
		});
		$('#addTask').click(function(e) {
			e.preventDefault();
			$.blockUI({
				message: 'processing...',
				overlayCSS: { backgroundColor: '#00f' }
			});
			$('#assignedTo').val('');

			if($('#assignedToMe').is(':checked'))
				$('#assignedTo').val($('#assignedToMe').val());

			if($('#assignedToOthers').is(':checked') && $.trim($('#assignedToUsernames').val()) != '')
				$('#assignedTo').val($('#assignedTo').val()+","+$('#assignedToUsernames').val());

			$form=$(this).parents('form');
      		$form.find('.messages').html('');
			$.ajax({
				method:"POST",
				dataType:'JSON',
  				async: false,
				url:$form.attr('action'),
				data:$form.serializeArray(),
				success:function(data) {
					if(data.status) {
						if(data.needreload) setTimeout(location.reload(), 3000);
					}
					else {
						$('#message').html(data.message).addClass('error').fadeIn('slow');
					}
				},
				error:function(data){
					if(data.responseJSON) {
						var errorMessage = '';
						$.each(data.responseJSON, function(x,y) {
						$form.find('#' + x).addClass('has-error');
						errorMessage += '<li>' + y + '</li>'
						console.log(y);
						})
						$form.find('.messages').html(errorMessage);
					}
				},
			    complete: function() {
			        // unblock when remote call returns
			        $.unblockUI();
			    }
			});
		});
	});
</script>
@endsection