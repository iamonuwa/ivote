<?php get_header();
$elections = json_decode(file_get_contents(base_url('api/office/')));?>

<section id="benefits" class="benefits-section section-gray section">

				<div class="container">

					<h2 class="section-heading text-center">Positions</h2>

					<div class="benefits-row row">

						<?php foreach($elections as $key => $value){?>
						<div class="col-sm-3 col-md-3">
						<a href="<?= base_url('elections/'.strtolower($value->name));?>">
							<div class="benefit">
								<span class="benefit-icon fa fa-rocket" data-animation="bounceIn"></span>
								<h4 class="benefit-title"><?= $value->name;?></h4>
								<!-- <p class="benefit-description">Kickstart your landing page in no time with the available layouts provided in the package. Change the content and launch! Yes it's as easy as like that.</p> -->
							</div>
							</a>
						</div>
						<?php } ?>

					</div>

				</div>

				<?php 
				?>

			</section>
<?php get_footer();?>