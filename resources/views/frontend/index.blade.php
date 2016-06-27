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

<form class="form-signin col-md-6" action="/registeruser" method="post">
  <h2 class="form-signin-heading">Create an account</h2>
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <label for="fullName" class="sr-only">Email address</label>
  <input type="text" id="fullName" name="fullName" class="form-control mt10" placeholder="Full Name"  autofocus="">

  <label for="email" class="sr-only">Email address</label>
  <input type="email" id="email" name="email" class="form-control mt10" placeholder="Email address"  autofocus="">

  <label for="reEmail" class="sr-only">Email address</label>
  <input type="email" id="reEmail" name="reEmail" class="form-control mt10" placeholder="Re-enter email address"  autofocus="">

  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password"  name="password" class="form-control mt10" placeholder="Password" >

  <button class="btn btn-lg btn-block green mt10" type="submit">Create an account</button>
</form>


@endsection
