	
	<section id="hero" class="hero-section hero-layout-simple hero-fullscreen section section-dark">
	<div class="wrapper">
	<?php  if($this->session->flashdata('msg') != ''){?>
  <div id="alert-msg" class=" col-xs-4 alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <i class="icon fa fa-bullhorn"></i><?= $this->session->flashdata('msg');?>
  </div>
                <?php }
                  if($this->session->flashdata('success') != ''){?>
   <div id="alert-success" class="alert alert-success alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <i class="icon fa fa-bullhorn"></i><?= $this->session->flashdata('success');?>
  </div> <?php }?>
  </div>

				<div class="section-background">
					<ul class="section-background-slideshow rslides parallax" data-stellar-ratio="0.4" data-speed="800" data-timeout="4000">
						<li><img src="<?php theme_path('images/backgrounds/hero-bg-slideshow-1.jpg');?>" alt="" style="opacity: 0.25;"></li>
						<li><img src="<?php theme_path('images/backgrounds/hero-bg-slideshow-2.jpg');?>" alt="" style="opacity: 0.25;"></li>
						<li><img src="<?php theme_path('images/backgrounds/hero-bg-slideshow-3.jpg');?>" alt="" style="opacity: 0.2;"></li>
					</ul>

				</div>

				<div class="container">

					<div class="hero-content">
						<div class="hero-content-inner">

<?php var_dump($election);?>
							<div class="row">
							<?php if(isset($election)){?>
							<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

											
											<div class="hero-countdown text-center">

												<h3 class="hero-countdown-heading">Election Starts in &hellip;</h3>

												<div class="countdown" data-countdown="<?= date('m/d/Y',$election['election_date']);?>" style="display: none;">
													<!-- COUNTDOWN CONFIGURATION -->
													<!-- ref: http://hilios.github.io/jQuery.countdown/documentation.html -->
													<div class="countdown-grid">
														<span class="countdown-number">%w</span>
														<span class="countdown-label">weeks</span>
													</div>
													<div class="countdown-grid">
														<span class="countdown-number">%d</span>
														<span class="countdown-label">days</span>
													</div>
													<div class="countdown-grid">
														<span class="countdown-number">%H</span>
														<span class="countdown-label">hours</span>
													</div>
													<div class="countdown-grid">
														<span class="countdown-number">%M</span>
														<span class="countdown-label">minutes</span>
													</div>
													<div class="countdown-grid">
														<span class="countdown-number">%S</span>
														<span class="countdown-label">seconds</span>
													</div>
												</div>
											
											</div>

										</div>
										<div class="col-md-12">

									<p class="hero-buttons text-center">
										<a href="<?= base_url('voter-education');?>" class="btn btn-lg btn-default">Learn More</a>
										<a href="#" role="button" data-toggle="modal" data-target="#login-modal" class="btn btn-lg btn-success">Login</a>
									</p>

								</div>
												<?php 
										}
										else
										{
												?>
												<div class="col-md-10 col-md-offset-1">
										<div class="hero-heading text-center" data-animation="fadeIn">

										<h1 class="hero-title">This is iVoter System</h1>

										<p class="hero-tagline">If you are seeing this, there is currently no election running</p>

									</div>
									</div>
											<?php
											} ?>
								<div class="col-md-12">

									<p class="hero-buttons text-center">
									
									</p>

								</div>
							</div>

						</div>
					</div>

				</div>
<a href="#footer" class="hero-start-link anchor-link"><span class="fa fa-angle-double-down"></span></a>
			</section>
			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img  id="img_logo" src="<?= base_url('public_html/uploads/logo.png');?>">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-close" aria-hidden="true"></span>
					</button>
				</div>
                
                <div id="div-forms">
                
                    <form id="login-form" action="<?= base_url('voting');?>" method="POST">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="fa fa-angle-right pull-right"></div>
                                <span id="text-login-msg"> Voter Login.</span>
                            </div>
				    		<input id="voter_id" name="id_number" class="form-control" type="text" placeholder="VOTER ID" required>
				    		<input id="password" name="password" class="form-control" type="password" placeholder="VOTER PIN" required>
                           
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
                            </div>
				        </div>
                    </form>
                   
                    
                </div>
                
			</div>
		</div>
	</div>

		<?php get_footer();?>