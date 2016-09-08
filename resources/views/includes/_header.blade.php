    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bawana') }} | @yield('title')</title>

    <!-- Bootstrap -->
    {!! Html::style('assets/vendors/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('assets/vendors/font-awesome/css/font-awesome.min.css') !!}
    <!-- NProgress -->
    {!! Html::style('assets/vendors/nprogress/nprogress.css') !!}
    <!-- iCheck -->
    {!! Html::style('assets/vendors/iCheck/skins/flat/green.css') !!}
    {!! Html::style('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') !!}
    <!-- PNotify -->
    {!! Html::style('assets/vendors/pnotify/dist/pnotify.css') !!}
    {!! Html::style('assets/vendors/pnotify/dist/pnotify.buttons.css') !!}
    {!! Html::style('assets/vendors/pnotify/dist/pnotify.nonblock.css') !!}

    @yield('stylesheet')

    <!-- Custom Theme Style -->
    {!! Html::style('assets/build/css/custom.min.css') !!}
    <script>
    window.Bawana = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
    </script>