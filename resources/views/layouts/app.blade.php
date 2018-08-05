<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this site -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" disabled>Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" disabled>Audits</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    @if( Auth::check() )
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Sign Out</span></a>
                            </li>
                        </ul>
                    @endif
                </form>
            </div>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        @yield('content')
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy; {{ config('app.name') }} &mdash; {{ date('Y') }}</span>
      </div>
    </footer>


  </body>
</html>
