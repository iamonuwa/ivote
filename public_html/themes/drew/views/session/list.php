<?php get_header();
$candidates = json_decode(file_get_contents(base_url('api/elections/')));
$election = json_decode(file_get_contents(base_url('api/elections/')));?>


<section id="closing" class="closing-section section-dark section">

				<div class="section-background">

					<!-- IMAGE BACKGROUND -->
					<div style="top: 108.71px;" class="section-background-image parallax" data-stellar-ratio="0.4">
						<img src="<?= base_url('public_html/uploads/bg.jpg');?>" alt="" style="opacity: 0.25; width: 1349px; height: 899.614px; margin-top: -272.307px; margin-left: 0px;">
					</div>

				</div>
<div class="container">
					
					<h2 class="section-heading text-center"> <?= $this->aauth->get_user()->surname. ' ' . $this->aauth->get_user()->firstname . ' ' . $this->aauth->get_user()->othername; ?> </h2>
					<div class="row">
						<div class="col-sm-4">
							<img class="hiw-item-picture img-rounded" src="<?= $this->aauth->get_user()->picture; ?>" alt="<?= $this->aauth->get_user()->name; ?>">
						</div>
						<div class="col-sm-8">
							<ul class="nice-list element-list">
								<li><?= $this->aauth->get_user()->dateofbirth; ?></li>
								<li><?= $this->aauth->get_user()->occupation; ?></li>
								<li><?= $this->aauth->get_user()->phone; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</section>

<section id="benefits" class="benefits-section section-gray section">

<!-- TEAM
			================================= -->
			<section id="team" class="team-section section">
			<form id="vote-id">

				<div class="container-fluid">
					
					<h2 class="section-heading text-center">ELECTION</h2>

					<div class="container">

					<div class="team-row row">

					<?php foreach( $candidates as $candidate ): 
					
					?>
						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member">
								<input type="radio" id="selected" class="form-control" name="choice">
								<img class="team-member-picture" src="<?= $candidate->picture;?>" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name"><?= $candidate->surname ." ". $candidate->firstname ." ". $candidate->othername;?></h4>
									<div class="team-member-position">Gender: <?= $candidate->gender;?></div>
									<p class="team-member-description">Party: <?= $candidate->party;?></p>

								</div>
							</div>
						</div>
					<?php endforeach; ?>

					</div>

				</div>

				<div class="section-heading text-center"><a href="<?= base_url('voter/'.$this->aauth->get_user()->name).'/verify';?>" role="button" onclick="getCandidateID" data-toggle="modal" data-target="#pin-modal" class="btn btn-lg btn-default"> Vote </a></div>

				</div>
			</form>
			</section>

				<?php 
				?>

			</section>
<script>
	document.getElementById('#voter-id').onsubmit = function () {
		var val = getRadioVal(this, 'selected');
		alert(val);
	}
</script>
			
<?php get_footer();?>