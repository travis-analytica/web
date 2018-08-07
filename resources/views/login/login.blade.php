<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  </head>

  <body class="text-center" background="{{ asset('img/login-cover.png') }}">

    <form class="form-signin" action="{{ url('login') }}" method="POST">
        {{ csrf_field() }}
<div class="card p-4">
        <img class="mb-4" src="https://avatars2.githubusercontent.com/u/41131861?s=200&v=4" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

        <div class="checkbox mb-3 text-left">
        <label>
            <input type="checkbox" name="remember-me" value="remember-me"> Remember me
        </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-left">&copy; {{ config('app.name') }} &mdash; {{ date('Y') }}</p>

</div>
    </form>
  </body>
</html>
