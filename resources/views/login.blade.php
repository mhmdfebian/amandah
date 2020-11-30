<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Amandah Login</title>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex align-items-center justify-content-center border-right border-thick">
            <img src="{{url('/images/logo.png')}}">
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <form class="form-signin" action="{{ route('signin') }}" method="post">
                @csrf
                <h1 class="mb-3 font-weight-normal display-4">Admin Login</h1>

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

                @if (session('message'))

                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
                @endif

                <div class="d-flex">

                    <div class="mr-auto p-2 text-muted">&copy; 2020 Amandah</div>
                    <button class="btn btn-lg custom-yellow" type="submit">Login</button>
                </div>
            </form>
          </div>
        </div>
    </div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
