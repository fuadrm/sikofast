

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FastPrint | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">

<div class="row justify-content-center">
  <div class="col-md-12">

    @if (session('pesan'))
      <div class="alert alert-success alert-dismissible col-md-12"">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{session('pesan')}}.
      </div>
    @endif

    @if (session('loginError'))
      <div class="alert alert-danger alert-dismissible col-md-12"">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-times"></i> 
            {{session('loginError')}}</h5>
      </div>
    @endif

    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>FastPrint</b> Login</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <img src="" alt="" width="300" class="img">
          {{-- <form action="../../index3.html" method="post"> --}}
          <form action="/login" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" autofocus required
              value="{{ old('username')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-4">
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
              </div>
              <div class="col-4">
            </div>
              <!-- /.col -->
            </div>
          </form>
          {{-- <small class="d-block text-center mt-3">Not Registered?<a href="/register">
            <u>Register Now!</u></a></small> --}}

        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
<!-- /.login-box -->
  </div>
</div>
<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>

</body>
</html>

