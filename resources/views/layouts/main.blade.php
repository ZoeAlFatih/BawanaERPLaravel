<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes._header')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            @include('includes._sidebar_menu')
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                @include('includes._nav_header')
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('includes._footer')
        <!-- /footer content -->
    </div>
</div>

@include('includes._javascripts')

@yield('scripts')

@include('includes._message')

</body>
</html>
