@extends('masterpage.frontend')

@section('content')
<div class="row text-center">
	<div class="alert alert-success" style="font-size: 150%;">
		Your account has been activated.<br/>
		<a href="{{route('FrontEndHomeWithType', ['type'=>'login'])}}"><< Sign in >></a>
	</div>
</div>
@endsection
