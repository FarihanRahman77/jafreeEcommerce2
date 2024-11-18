<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>


<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<script src="{{asset('/')}}admin/ckeditor/ckeditor.js"></script>
<script src="{{asset('/')}}admin/ckfinder/ckfinder.js"></script>
<script src="{{asset('/')}}admin/ckeditor/samples/js/sample.js"></script>

<script>
  $(function () {
    $(".dt_view").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
  
</script>
<script>
        $('.nav-link').click(function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        })
    </script>

<script>
    initSample();
    var editor1 = CKEDITOR.replace( 'shortDescriptionCkeditor');
    var editor2 = CKEDITOR.replace( 'longDescriptionCkeditor' );
    var editor3 = CKEDITOR.replace( 'contentDescriptionCkeditor');
    var editor4 = CKEDITOR.replace( 'reportHeader1Ckeditor');
    var editor5 = CKEDITOR.replace( 'reportHeader2Ckeditor');
    CKFinder.setupCKEditor(editor1);
    CKFinder.setupCKEditor(editor2);
    CKFinder.setupCKEditor(editor3);
    CKFinder.setupCKEditor(editor4);
    CKFinder.setupCKEditor(editor5);
</script>