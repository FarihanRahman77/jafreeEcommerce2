<!DOCTYPE html>
<html>
    @include('admin.includes.header')
    <!-- End of Header -->
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            @include('admin.includes.topbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.includes.sidebar')
            <!-- Main Sidebar Container -->
            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->
            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- End of Footer -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- JavaScripts -->
        @include('admin.includes.javaScripts')
        <!-- End of JavaScripts -->
        <!-- Begin Page javaScripts -->
        @yield('contentJavaScripts')
        <!-- End Page javaScripts -->
        <script>
            $('.navbar .nav-item .navlink').click(function () {
                $('.navbar .nav-item').removeClass('active');
                $(this).addClass('active');
            })
        </script>
    </body>
</html>
