<?php get_header();
?>
<section id="closing" class="closing-section section-dark section">

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
  
				<div class="section-background">

					<div style="top: 108.71px;" class="section-background-image parallax" data-stellar-ratio="0.4">
						<img src="<?= base_url('public_html/uploads/bg.jpg');?>" alt="" style="opacity: 0.25; width: 1349px; height: 899.614px; margin-top: -272.307px; margin-left: 0px;">
					</div>

				</div>
<div class="container">
					
					<h2 class="section-heading text-center"> <?= $this->session->userdata('username'); ?> </h2>
					<div class="row">
						<div class="col-sm-4">
							<img class="hiw-item-picture img-rounded" src="<?= $this->session->userdata('picture'); ?>" alt="<?= $this->session->userdata('picture'); ?>">
						</div>
						<div class="col-sm-8">
							<ul class="nice-list element-list">
								<li><?= $this->session->userdata('surname')." ". $this->session->userdata('firstname')." ". $this->session->userdata('othername'); ?></li>
								<li><?= $this->session->userdata('dateofbirth'); ?></li>
								<li><?= $this->session->userdata('occupation'); ?></li>
								<li><?= $this->session->userdata('phone'); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</section>

<section id="benefits" class="benefits-section section-gray section">

<!-- TEAM
			================================= -->
			<section id="team" class="team-section section">
			<form id="vote-id" name="vote" action="<?= base_url('ballot');?>" method="POST">

				<div class="container-fluid">

					
					<h2 class="section-heading text-center">ELECTION</h2>

					<div class="container">

					<div class="team-row row">

					<?php 

					foreach( $candidates as $candidate ): ?>
						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member">
								<input type="radio" id="selected" onclick="validate()" class="form-control" name="radio" value="<?= $candidate->id;?>">
								<img class="team-member-picture" src="<?= $candidate->picture;?>" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name"><?= $candidate->surname ." ". $candidate->firstname ." ". $candidate->othername;?></h4>
									<div class="team-member-position">Gender: <?= $candidate->gender;?></div>
									<p class="team-member-description">Party: <?= $candidate->party;?></p>

								</div>
							</div>
						</div>
					<?php 
				endforeach; 
				?>

					</div>

				</div>

					<div id="submit"  style="display:none">
					<div class="container">

					<div class="team-row row">
							<div class="team-member">
							<br>
							<label for="pin" class="label-control">Enter your voter pin:</label>
							<input type="text" class="form-control" name="voter-pin" placeholder="Enter Voter PIN" required>
							</div>
							</div>
							</div>


				<div class="section-heading text-center">
				<br>
				<input class="btn btn-lg btn-default" type="submit" value="Vote"/>
				</div>
				</div>

				</div>
			</form>
			</section>

				<?php 
				?>
	<?php
	$test = $this->voters_model->get('15');
	 var_dump($test['firstname']);?>

			</section>

			<script>
			function validate (id) {
				var $radio = $('#selected');
				$("#submit").show();
				// $("#hidden").append(id);
			}
			</script>

<?php get_footer();?> 
