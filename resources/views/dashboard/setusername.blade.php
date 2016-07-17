@extends('masterpage.dashboard')

@section('content')
<div class="row">
	<div class="col-lg-12">
	    <div class="alert alert-info alert-dismissable">
	        <i class="fa fa-info-circle"></i>  <strong>Specify username!</strong> You can only choose a username one and can not be changed.<br/>
	        Note: You can use NgeKEEP feature after choosing a username. Username is the way people get you.
	    </div>
   	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Set My Username</h3>
	        </div>
	        <div class="panel-body">
	        	<div class="col-sm-offset-2 col-sm-10">
			  		{!! Form::open(array('url' => route('SetUsername'), 'class' => 'form-inline')) !!}
						<div class="form-group">
						    {{ Form::email('username', null, array('id' => 'username', 'class' => 'form-control', 'placeholder' =>'Username', 'required' => '', 'autofocus' => '')) }}
					  	</div>
					  	{{ Form::submit('Save Changes', array('id'=>'setUsername', 'class' => 'btn blue'))}}
					  	<div class="form-group" style="display:block; margin-top: 5px;">
						    <label for="message" id="message"></label>
					  	</div>
					{!! Form::close() !!}
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('headOptional')
<script type="text/javascript">
	$(document).ready(function() {
		$('#username').keyup(function() {
			$('#username').trigger('change');
			console.log($.trim($('#username').val()));
			$('#message').removeClass('error').removeClass('success');
			if($(this).val().length <=5 ) {
				$('#message').html('Must be at least 6 characters').addClass('error');
			}
			else {
				$('#message').html('');
				$.ajax({
					method:"GET",
					url: "/checkusername/" + $.trim($('#username').val()),
					dataType:'JSON',
				  	async: false,
				  	success:function(data){
				      if(data.status) {
				        $('#message').html('Username is available.').addClass('success').fadeIn('slow');
				      }
				      else $('#message').html(data.message).addClass('error').fadeIn('slow');
					}
				});
			}
		});

		$('#setUsername').click(function(e) {
			e.preventDefault();
			$('#message').removeClass('error').removeClass('success');
			$form=$(this).parents('form');
			$.ajax({
				method:"POST",
				dataType:'JSON',
  				async: false,
				url:$form.attr('action'),
				data:$form.serializeArray(),
				success:function(data) {
					if(data.status) {
						$('#username').prop('disabled', true);
						$('#message').html(data.message).addClass('success').fadeIn('slow');
						if(data.needreload) setTimeout(location.reload(), 3000);;
					}
					else {
						$('#message').html(data.message).addClass('error').fadeIn('slow');
					}
				},
			});
		});
	});
</script>
@endsection