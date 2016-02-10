<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html ng-app="ivoterApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= APP_NAME;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?= base_url('public_html/uploads/favicon.ico');?>">
    <link rel="stylesheet" href="<?php theme_path('bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php theme_path('dist/css/AdminLTE.min.css');?>">
    <link rel="stylesheet" href="<?php theme_path('dist/css/fullcalender.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/datatables/dataTables.bootstrap.css');?>">
    <link rel="stylesheet" href="<?php theme_path('app/wizard.css');?>">
    <link rel="stylesheet" href="<?php theme_path('dist/css/skins/_all-skins.min.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/iCheck/flat/blue.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/morris/morris.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php theme_path('app/toastr.min.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/datepicker/datepicker3.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/daterangepicker/daterangepicker-bs3.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/select2/select2.min.css');?>">
    <link rel="stylesheet" href="<?php theme_path('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script>
  var BASE_URL = '<?= base_url();?>';
  </script>
  </head>
  <?php if($this->aauth->is_loggedin()){?>
    <body class="hold-transition sidebar-mini fixed">
    <div class="wrapper">

      <header class="main-header">
        <a href="#/" class="logo">
          <span class="logo-mini"><?= APP_NAME;?></span>
          <span class="logo-lg"><?= APP_NAME;?></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" ng-init="getUser">
                  <img src="<?php if(isset($this->aauth->get_user()->picture)){ echo $this->aauth->get_user()->picture; } else{ echo base_url('public_html/uploads/default.png');}?>" class="user-image" alt="<?= $this->aauth->get_user()->name; ?>">
                  <span class="hidden-xs"><?= $this->aauth->get_user()->name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php if(isset($this->aauth->get_user()->picture)){ echo $this->aauth->get_user()->picture; } else{ echo base_url('public_html/uploads/default.png');}?>" class="img-circle" alt="User Image">
                    <p>
                      Hello <?= $this->aauth->get_user()->name; ?>!
                      <small>Last Login <?= $this->aauth->get_user()->last_login;?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url('backend/logout');?>" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:void(0)" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview"><a href="#/"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a></li>
            <li class="treeview"><a href="#/mailer"><i class="fa fa-inbox"></i> <span> <?= $this->lang->line('mail'); ?> </span></a></li>
            <li class="treeview">
              <a href="javascript:void(0)"><i class="glyphicon glyphicon-credit-card"></i> <span><?= $this->lang->line('elections'); ?></span> 
              <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="#/setup-election"><i class="fa fa-plus"></i> <?= $this->lang->line('setup_election'); ?></a></li>
              <li><a href="#/voters"><i class="fa fa-hand-pointer-o"></i> <?= $this->lang->line('voters'); ?></a></li>
                <li><a href="#/office"><i class="glyphicon glyphicon-book"></i> <?= $this->lang->line('office'); ?></a></li>
                <li><a href="#/party"><i class="fa fa-credit-card"></i> <?= $this->lang->line('party'); ?></a></li>
                <li><a href="#/candidates"><i class="fa fa-certificate"></i> <?= $this->lang->line('candidates'); ?></a></li>
              </ul>
            </li>
              <li class="treeview">
              <a href="javascript:void(0)"><i class="fa fa-users"></i> <span>Users</span> 
              <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#/users"><i class="fa fa-user"></i> <?= $this->lang->line('accounts'); ?></a></li>
                <li><a href="#/locked-accounts"><i class="fa fa-user-times"></i> <?= $this->lang->line('deactivated_accounts'); ?> </a></li>
                <li><a href="#/roles"><i class="fa fa-sort-amount-asc"></i> <?= $this->lang->line('roles'); ?> </a></li>
                <li><a href="#/permissions"><i class="fa fa-hand-stop-o "></i> <?= $this->lang->line('permissions'); ?> </a></li>
              </ul>
            </li>
             <li class="treeview">
                 <a href="javascript:void(0)"><i class="fa fa-gears"></i> <span><?= $this->lang->line('site'); ?></span> 
                 <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                        <li><a href="#/app-settings"><i class="fa fa-gear"></i> Web Settings</a></li>
              <li><a href="#/delimitation"><i class="fa fa-laptop"></i> Center Deliimitation</a></li>
                        
               <li>
                      <a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Frontend <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="javascript:void(0)"><i class="fa fa-book"></i> Themes</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-cog"></i> Configuration</a></li>
                        <li><a target="_blank" href="<?= base_url();?>"><i class="fa fa-eye"></i> View Frontend</a></li>
                      </ul>
                    </li>
                <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-cloud-download"></i> Database Storage</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>

      <?php } else {}?>
       
