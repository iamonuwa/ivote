<?php get_header();
$candidates = json_decode(file_get_contents(base_url('api/office/')));
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

				<div class="container">

					<h2 class="section-heading text-center">Election</h2>

					<div class="benefits-row row">
					<select>
					<?php foreach($candidates as $key => $value):
						// echo '<option value='.$value->id.'>'.$value->surname.' '.$value->firstname.' '.$value->othername.'</option>';
						echo '<option class="form-control" value='.$value->id.'>'.$value->name.'</option>';
					endforeach;?>
					</select>

						<?php {?>
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