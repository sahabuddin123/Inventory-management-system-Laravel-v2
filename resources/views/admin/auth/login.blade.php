<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('/assets/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/assets/plugins/iCheck/square/blue.css') }}">


 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('admin.login.post') }}" method="post">
    @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        
      </div>
    </form>

  </div>

</div>

@push('scripts')
<script src="{{ asset('/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('/assets/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
@endpush
</body>
</html>
