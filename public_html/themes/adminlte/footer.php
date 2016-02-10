       <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> <?= app_version();?>
        </div>
       <?= copyright();?>
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
          </div>
      </aside>
      <div class="control-sidebar-bg"></div>
    <script src="<?php theme_path('plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <script src="<?php theme_path('dist/js/moment.min.js');?>"></script> 
    <script src="<?php theme_path('dist/angular/angular.min.js');?>"></script>
    <script src="<?php theme_path('dist/angular/angular-route.min.js');?>"></script>
    <script src="<?php theme_path('dist/angular/angular-resource.min.js');?>"></script>
    <script src="<?php theme_path('dist/angular/angular-animate.min.js');?>"></script>
    <script src="<?php theme_path('dist/angular/angular-file-upload.min.js');?>"></script>
    <script src="<?php theme_path('app/toastr.min.js');?>"></script>
    <script src="<?php theme_path('app/ui-bootstrap-tpls-0.10.0.min.js');?>"></script>
    <script src="<?php theme_path('plugins/jQueryUI/jquery-ui.min.js');?>"></script>
    <script src="<?php theme_path('bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php theme_path('app/camera/webcam.js');?>"></script>
    <script src="<?php theme_path('app/camera/angular-camera.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php theme_path('plugins/morris/morris.min.js');?>"></script>
    <script src="<?php theme_path('plugins/sparkline/jquery.sparkline.min.js');?>"></script>
    <script src="<?php theme_path('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
    <script src="<?php theme_path('plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
    <script src="<?php theme_path('plugins/knob/jquery.knob.js');?>"></script>
    <script src="<?php theme_path('plugins/select2/select2.full.min.js');?>"></script>
    <script src="<?php theme_path('plugins/input-mask/jquery.inputmask.js');?>"></script>
    <script src="<?php theme_path('plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
    <script src="<?php theme_path('plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
    <script src="<?php theme_path('plugins/daterangepicker/daterangepicker.js');?>"></script>
    <script src="<?php theme_path('plugins/datepicker/bootstrap-datepicker.js');?>"></script>
    <script src="<?php theme_path('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
    <script src="<?php theme_path('plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <script src="<?php theme_path('plugins/iCheck/icheck.min.js');?>"></script>
    <script src="<?php theme_path('plugins/fastclick/fastclick.min.js');?>"></script>
    <script src="<?php theme_path('dist/js/app.min.js');?>"></script>
    <script src="<?php theme_path('dist/js/demo.js');?>"></script>
    <script src="<?php theme_path('app/app.js');?>"></script>
    <script src="<?php theme_path('app/route.js');?>"></script>
    <script src="<?php theme_path('app/init.js');?>"></script>
    <script src="<?php theme_path('app/camera/app.js');?>"></script>
    <script src="<?php theme_path('app/camera/controller.js');?>"></script>
    <script src="<?php theme_path('app/camera/directive.js');?>"></script>
<script>
  $(function () {
        $("[data-mask]").inputmask();
      });

</script>

<script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
 <script>
toastr.options = {
  "closeButton": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 </script>   
 
  </body>
</html>
