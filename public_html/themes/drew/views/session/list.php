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

<!-- TEAM
			================================= -->
			<section id="team" class="team-section section">
			<form>

				<div class="container-fluid">
					
					<h2 class="section-heading text-center">ELECTION</h2>

					<div class="team-row row">

						<!-- TEAM MEMBER 1 -->
						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member">
						<input type="radio" name="choice" value="candidate1">
								<img class="team-member-picture" src="images/contents/team-member-1.jpg" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name">Jason Castillo</h4>
									<div class="team-member-position">CEO &amp; Co-Founder</div>
									<p class="team-member-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								</div>
							</div>
						</div>

						<!-- TEAM MEMBER 2 -->
						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member even">
						<input type="radio" name="choice" value="candidate2">
								<img class="team-member-picture" src="images/contents/team-member-2.jpg" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name">Harold Kelly</h4>
									<div class="team-member-position">CTO &amp; Co-Founder</div>
									<p class="team-member-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								</div>
							</div>
						</div>

						<div class="hidden-md hidden-lg clear"></div>

						<!-- TEAM MEMBER 3 -->

						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member">
						<input type="radio" name="choice" value="candidate3">
								<img class="team-member-picture" src="images/contents/team-member-3.jpg" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name">Kathy Nelson</h4>
									<div class="team-member-position">Graphic Designer</div>
									<p class="team-member-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								</div>
							</div>
						</div>

						<div class="hidden-sm hidden-lg clear"></div>

						<!-- TEAM MEMBER 4 -->

						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member even">
						<input type="radio" name="choice" value="candidate4">
								<img class="team-member-picture" src="images/contents/team-member-4.jpg" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name">Dylan Fowler</h4>
									<div class="team-member-position">UI/UX Designer</div>
									<p class="team-member-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								</div>
							</div>
						</div>

						<div class="hidden-md hidden-lg clear"></div>

						<!-- TEAM MEMBER 5 -->

						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member">
						<input type="radio" name="choice" value="candidate5">
								<img class="team-member-picture" src="images/contents/team-member-5.jpg" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name">Carolyn Harvey</h4>
									<div class="team-member-position">Development</div>
									<p class="team-member-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								</div>
							</div>
						</div>

						<!-- TEAM MEMBER 6 -->

						<div class="col-sm-6 col-md-4 col-lg-2" data-animation="fadeIn">
							<div class="team-member even">
						<input type="radio" name="choice" value="candidate6">
								<img class="team-member-picture" src="images/contents/team-member-6.jpg" alt="">
								<div class="team-member-text">
									<h4 class="team-member-name">Diane Grant</h4>
									<div class="team-member-position">Marketing &amp; Strategy</div>
									<p class="team-member-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								</div>
							</div>
						</div>

					</div>

				</div>
			</form>
			</section>

				<?php 
				?>

			</section>
<?php get_footer();?>