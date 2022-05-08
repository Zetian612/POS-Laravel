<!DOCTYPE html>
<html lang="en">

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
</body>

</html>
