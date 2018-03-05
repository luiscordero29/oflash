<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Luis Cordero
            </div>
            <strong>Programador Web Freelance</strong>
        </footer>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('vendor/jquery/dist/jquery.js'); ?>"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url('vendor/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url('vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/morris.js/morris.min.js'); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('vendor/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('vendor/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('vendor/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('vendor/moment/min/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('vendor/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('vendor/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('vendor/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('vendor/admin-lte/dist/js/adminlte.js'); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('vendor/admin-lte/dist/js/pages/dashboard.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('vendor/admin-lte/dist/js/demo.js'); ?>"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $( ".treeview" ).click(function() {
                if ($( this ).hasClass( "active" )) {
                    $( this ).removeClass( "active" );
                    $( this ).find( "a > span > i.fa" ).addClass( "fa-angle-left" );
                    $( this ).find( "a > span > i.fa" ).removeClass( "fa-angle-down" );
                }else{
                    $( ".treeview" ).removeClass( "active" );
                    $( ".treeview" ).find( "a > span > i.fa" ).addClass( "fa-angle-left" );
                    $( ".treeview" ).find( "a > span > i.fa" ).removeClass( "fa-angle-down" );
                    $( this ).addClass( "active" );
                    $( this ).find( "a > span > i.fa" ).addClass( "fa-angle-down" );
                    $( this ).find( "a > span > i.fa" ).removeClass( "fa-angle-left" );
                }
            });
            <?php if ($this->uri->segment(1, 0) === 'account'): ?>
                $( "#account" ).addClass( "active" );
                $( "#account" ).find( "a > span > i.fa" ).addClass( "fa-angle-down" );
                $( "#account" ).find( "a > span > i.fa" ).removeClass( "fa-angle-left" );
                <?php if ($this->uri->segment(2, 0) === 'index'): ?>
                    $( "#account-index" ).addClass( "active" );
                <?php endif; ?>
                <?php if ($this->uri->segment(2, 0) === 'update'): ?>
                    $( "#account-update" ).addClass( "active" );
                <?php endif; ?>
                <?php if ($this->uri->segment(2, 0) === 'password'): ?>
                    $( "#account-password" ).addClass( "active" );
                <?php endif; ?>
                <?php if ($this->uri->segment(2, 0) === 'logout'): ?>
                    $( "#account-logout" ).addClass( "active" );
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($this->uri->segment(1, 0) === 'users'): ?>
                $( "#users" ).addClass( "active" );
                $( "#users" ).find( "a > span > i.fa" ).addClass( "fa-angle-down" );
                $( "#users" ).find( "a > span > i.fa" ).removeClass( "fa-angle-left" );
                $( "#users-index" ).addClass( "active" );
                $( ".users-search" ).click(function() {
                    var field = $( this ).data('field');
                    var orderby = $( this ).data('orderby');
                    $( "#users-form-search-field" ).val(field);
                    $( "#users-form-search-orderby" ).val(orderby);
                    $( "#users-form-search" ).submit();
                });
            <?php endif; ?>
        });
    </script>
</body>
</html>