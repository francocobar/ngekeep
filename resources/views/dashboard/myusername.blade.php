@extends('masterpage.dashboard')

@section('content')
<div class="row">
	<div class="col-lg-12">
	    <div class="alert alert-info alert-dismissable">
	        <i class="fa fa-info-circle"></i>
	        Note: Username is the way people get you.
	    </div>
   	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title"><i class="fa fa-user"></i> My Username</h3>
	        </div>
	        <div class="panel-body">
	        	<div class="col-sm-offset-2 col-sm-10">
			  		{!! Form::open(array('class' => 'form-inline')) !!}
						<div class="form-group">
						    {{ Form::email('username', Auth::user()->username, array('id' => 'username', 'class' => 'form-control', 'placeholder' =>'Username', 'disabled' => '')) }}
					  	</div>
					{!! Form::close() !!}
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection
