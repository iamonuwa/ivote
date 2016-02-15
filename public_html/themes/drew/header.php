<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

	
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?= APP_NAME;?></title>
		<meta name="author" content="David Rozando">
		<meta name="keywords" content="responsive, parallax, bootstrap, html5 template, one page, landing page">
		<meta name="description" content="Drew - A Multipurpose Landing Page Template">
		<link rel="icon" href="<?= base_url('public_html/uploads/favicon.ico');?>">
		<link rel="apple-touch-icon" href="<?= base_url('public_html/uploads/favicon.ico');?>">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
		<link rel="stylesheet" href="<?php theme_path('css/bootstrap.min.css');?>">
		<link rel="stylesheet" href="<?php theme_path('css/font-awesome.min.css');?>">
		<link rel="stylesheet" href="<?php theme_path('css/animate.min.css');?>">
		<link rel="stylesheet" href="<?php theme_path('css/style.css');?>">
		<link id="color-css" rel="stylesheet" href="<?php theme_path('css/colors/orange.css');?>">
	</head>
<body>
<div id="document" class="document">
			<header id="header" class="header-section section section-dark navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-logo navbar-brand" href="<?= base_url();?>">
							<img src="<?= base_url('public_html/uploads/logo.png');?>" srcset="<?= base_url('public_html/uploads/logo.png');?> 2x" alt="<?= APP_NAME;?>">
						</a>
					</div>
					<nav id="navigation" class="navigation navbar-collapse collapse navbar-right">
						<ul id="header-nav" class="nav navbar-nav">
							<li><a href="#hero" class="hidden">Top</a></li>
							<?php if($this->ion_auth->logged_in()){?>
							<li class="dropdown dropdown-hover user-menu">
								<a href="#" class="dropdown-toggle external" data-toggle="dropdown" role="button" aria-expanded="false">
								<img src="<?php if( $this->session->userdata('username') !== '') { echo $this->session->userdata('username'); } else{ echo base_url('public_html/uploads/default.png'); }?>" class="user-image" alt="<?= $this->session->userdata('username');; ?>"><?= $this->session->userdata('username'); ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php if($this->session->userdata('username') !== '') { echo $this->session->userdata('username'); } else{ echo base_url('public_html/uploads/default.png'); }?>" class="img-circle" alt="User Image">
                    <p>
                      Welcome <?= $this->session->userdata('username'); ?>!
                      <small>Last Login <?= $this->session->userdata('username');?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?= base_url('logout');?>" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
							</li>
							<?php } ?>
							<li><a href="<?= base_url();?>" >HOME</a></li>
							<li><a href="<?= base_url('about-inec');?>">ABOUT INEC</a></li>
							<li><a href="<?= base_url('elections');?>">ELECTIONS</a></li>
							<li><a href="<?= base_url('political-parties');?>">POLITICAL PARTIES</a></li>
							<li><a href="<?= base_url('voter-education');?>">VOTER EDUCATION</a></li>
							<li><a href="<?= base_url('contact-inec');?>">CONTACT US</a></li>
						</ul>
					</nav>
				</div>
			</header>

