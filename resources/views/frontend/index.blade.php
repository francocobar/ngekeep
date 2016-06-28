@extends('masterpage.frontend')

@section('content')

<h1 class="text-center">
NgeKEEP!
</h1>
<form class="form-signin col-md-6">
  <h2 class="form-signin-heading">Sign in</h2>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control mt10" placeholder="Email address"  autofocus="">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control mt10" placeholder="Password" >
  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-block blue" type="submit">Sign in</button>
</form>

{!! Form::open(array('url' => route('registeruser'), 'class' => 'form-signin col-md-6')) !!}
  <h2 class="form-signin-heading">Create an account</h2>
  <label for="fullName" class="sr-only">Email address</label>
  {{ Form::text('fullName', null, array('id' => 'fullName', 'class' => 'form-control mt10', 'placeholder' => 'Full Name', 'required' =>'', 'autofocus' => '')) }}

  <label for="email" class="sr-only">Email address</label>
  {{ Form::email('email', null, array('id' => 'email', 'class' => 'form-control mt10', 'placeholder' =>'Email Address', 'required' => '', 'autofocus' => '')) }}
  <label for="reEmail" class="sr-only">Email address</label>
  {{ Form::email('reEmail', null, array('id' => 'reEmail', 'class' => 'form-control mt10', 'placeholder' => 'Re-enter email address', 'required' => '', 'autofocus' => ''))}}

  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password"  name="password" class="form-control mt10" placeholder="Password" >
  <ul class="messages">

  </ul>

  {{ Form::submit('Create an account', array('class' => 'submitButton btn btn-lg btn-block green mt10'))}}
{!! Form::close() !!}


@endsection
