<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jendela PMI - Login Portal</title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  @include('layouts.css')
  <style>
    .bg-merah {
      background-color: #bd2323
    }

    .form-control {
      border-color: #bd2323
    }

    .form-control:focus {
      border-color: #FF0000;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }

  </style>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-merah">
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-form">
          <div class="login-logo mt-2 mb-4">
            <a href="index.html">
              <img class="align-content" src="{{ asset('images/logo-pmi-bwi.png') }}" alt="logopmibwi"
                style="width: 50%;">
            </a>
          </div>
          @include('layouts.flash')
          <form action="{{ route('login.do') }}" class="text-center" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn bg-merah text-white shadow m-b-30 m-t-30 mb-4"
              style="width: 80px !important;">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  @include('layouts.js')


</body>

</html>
