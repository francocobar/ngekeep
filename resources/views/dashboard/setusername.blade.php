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
    <div class="col-sm-offset-2 col-sm-10">
  		{!! Form::open(array('url' => route('SetUsername'), 'class' => 'form-inline')) !!}
			<div class="form-group">

			    {{ Form::email('username', null, array('id' => 'username', 'class' => 'form-control', 'placeholder' =>'Username', 'required' => '', 'autofocus' => '')) }}
		  	</div>
		  	{{ Form::submit('Save Changes', array('id'=>'setUsername', 'class' => 'btn btn-primary'))}}
		  	<div class="form-group" style="display:block; margin-top: 5px;">
			    <label for="message" id="message"></label>
		  	</div>
		{!! Form::close() !!}
    </div>
</div>
@endsection

@section('headOptional')
<script type="text/javascript">
	$( document ).ready(function() {
		$('#username').keypress(function() {
			if($(this).val().length <=5 ) {
				$('#message').html('Must be at least 6 characters').addClass('error');
			}
			else $('#message').html('').removeClass('error');
		});
	});
</script>
@endsection