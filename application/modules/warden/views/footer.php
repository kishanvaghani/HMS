  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Developed by </b><strong><a>DK Production</a></strong>
    </div>
    <strong>Copyright @ <a>LE College,Morbi</a>.</strong> All rights
    reserved.
  </footer>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>admindata/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>admindata/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>admindata/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>admindata/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>admindata/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>admindata/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>admindata/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>admindata/dist/js/demo.js"></script>


<script src="<?php echo base_url(); ?>admindata/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->

<script src="<?php echo base_url(); ?>admindata/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admindata/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>





<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
       'scrollX'    : true
    })
  })
</script>

</body>
</html>
