<!DOCTYPE html>
<html lang="en">

    <!-- Header -->
    @include('admin.includes.header')
    <!-- End of Header -->

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @include('admin.includes.sidebar')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    @include('admin.includes.topbar')
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    @yield('content')
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('admin.includes.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- JavaScripts -->
        @include('admin.includes.javaScripts')
        <!-- End of JavaScripts -->

    </body>

</html>
