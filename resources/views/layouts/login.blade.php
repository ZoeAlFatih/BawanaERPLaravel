<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>
    <!-- Bootstrap -->
    {!! Html::style('assets/vendors/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('assets/vendors/font-awesome/css/font-awesome.min.css') !!}
    <!-- NProgress -->
    {!! Html::style('assets/vendors/nprogress/nprogress.css') !!}
    <!-- Animate.css -->
    {!! Html::style('assets/vendors/animate.css/animate.min.css') !!}

    <!-- Custom Theme Style -->
    {!! Html::style('assets/build/css/custom.min.css') !!}
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        @yield('content')
    </div>
</div>
<!-- Scripts -->
<script>
    window.Login = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
</body>
</html>
