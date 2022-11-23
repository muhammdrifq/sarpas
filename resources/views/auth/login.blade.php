<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> STFI | Log In Page</title>
  <link href="{{asset('assets/dist/img/logostfi.png')}}" rel="shortcut icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assest/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  
</head>
<body class="hold-transition login-page" style =  "background-color: lightblue;">
<div class="login-box" >
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card" align="center" style="background-color: #0F3460">
    <div class="card-body login-card-body" style="background-color: #0F3460">
      <p class="login-box-msg" ><h5 style="color:white;">𝗦𝗲𝗸𝗼𝗹𝗮𝗵 𝗧𝗶𝗻𝗴𝗴𝗶 𝗙𝗮𝗿𝗺𝗮𝘀𝗶 𝗜𝗻𝗱𝗼𝗻𝗲𝘀𝗶𝗮</h5></p>
    <br>
    <div align="center">
      <img src="{{asset('assets/dist/img/logostfi.png')}}" alt="logo" width="150px">
    </div>
    <br><br>
    <p style="color:white;">Please Enter Email and Password !</p>
      <form action="{{route('login')}}" method="post">
        @csrf
        <br>
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <img src="{{asset('assets/dist/img/email.png' )}}" width="20px" alt="">
              </div>
            </div>
  
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
  
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <img src="{{asset('assets/dist/img/padlock.png' )}}" width="20px" alt="">
              </div>
            </div>
            
            @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
               @enderror
  
          </div>
        
          <!-- /.col -->
          <div align="center">
          <div class="col-4">
            <button type="submit" class="btn btn-outline-success" onclick="showSwal('success-message')">Masuk</button>
          </div>
          
        </div>
          <!-- /.col -->
        </div>
      </form>
      
        <div class="social-auth-links text-center">
            <p style="color:white;">- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Sign up using Google+
            </a>
          </div>
          <a href="register" class="text-center" style="color:white;">Don't have account ? Register !</a>
          <br>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>