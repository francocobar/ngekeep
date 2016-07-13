@extends('masterpage.frontend')

@section('content')
<div class="row text-center">
	<div class="alert alert-danger" style="font-size: 150%;">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  	<span class="sr-only">Error:</span>
		Your account has not been activated.<br/>
		Please check the activation link in the inbox or spam folder of your email.
	</div>
</div>
@endsection
