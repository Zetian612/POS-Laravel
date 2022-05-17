<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.partials.sidebar')
    <!-- /.main sidebar container -->

    @include('layouts.partials.breadcrumb')
    <!-- Main content -->
    <div class="content">
        @if(Session::has('message'))
            <x-alert :type="Session::get('typealert')" :message="Session::get('message')"/>
        @endif
        @section('content')
        @show
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @include('layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('layouts.partials.scripts')

    @stack('scripts')
</body>

</html>
