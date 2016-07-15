@extends('masterpage.frontend')

@section('content')

@if(!$type || $type=='login')
{!! Form::open(array('url' => route('SignInUser'), 'class' => 'form-signin col-md-6')) !!}
  <h2 class="form-signin-heading">Sign in</h2>
  <label for="inputEmail" class="sr-only">Email address</label>
  {{ Form::email('inputEmail', null, array('id' => 'inputEmail', 'class' => 'form-control mt10', 'placeholder' =>'Email Address', 'required' => '', 'autofocus' => '')) }}
  <label for="inputPassword" class="sr-only">Password</label>
  {{ Form::password('inputPassword', array('id' => 'inputPassword', 'class' => 'form-control mt10', 'placeholder' => 'Password', 'required' => '', 'autofocus' => ''))}}
  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>

  <ul class="messages">

  </ul>
  {{ Form::submit('Sign in', array('class' => 'submitButton btn btn-lg btn-block blue mt10'))}}
{!! Form::close() !!}
@endif

@if(!$type || $type=='register')
{!! Form::open(array('url' => route('RegisterUser'), 'class' => 'form-signin col-md-6')) !!}
  <h2 class="form-signin-heading">Create an account</h2>
  <label for="fullName" class="sr-only">Email address</label>
  {{ Form::text('fullName', null, array('id' => 'fullName', 'class' => 'form-control mt10', 'placeholder' => 'Full Name', 'required' =>'', 'autofocus' => '')) }}

  <label for="email" class="sr-only">Email address</label>
  {{ Form::email('email', null, array('id' => 'email', 'class' => 'form-control mt10', 'placeholder' =>'Email Address', 'required' => '', 'autofocus' => '')) }}
  <label for="reEmail" class="sr-only">Email address</label>
  {{ Form::email('reEmail', null, array('id' => 'reEmail', 'class' => 'form-control mt10', 'placeholder' => 'Re-enter email address', 'required' => '', 'autofocus' => ''))}}

  <label for="password" class="sr-only">Password</label>
  {{ Form::password('password', array('id' => 'password', 'class' => 'form-control mt10', 'placeholder' => 'Password', 'required' => '', 'autofocus' => ''))}}

  <ul class="messages mt10">

  </ul>

  {{ Form::submit('Create an account', array('class' => 'submitButton btn btn-lg btn-block green mt10'))}}
{!! Form::close() !!}
@endif

@endsection
