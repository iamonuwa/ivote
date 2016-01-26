<?php if($this->aauth->is_loggedin()){
 get_header();?>
<div ng-view="" id="ng-view" class="slide-animation"></div>
<?php get_footer();
}else{
	get_header();
?>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?= base_url('login');?>"><img src="<?= base_url('public_html/uploads/logo.png');?>"></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form name="login" action="<?= base_url('login/authenticate');?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="id_number" class="form-control" placeholder="ID Number">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
  </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <?php }

    //get_footer();?>