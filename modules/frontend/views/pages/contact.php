<?php get_header();?>
<!-- CONTACT + MAPS
			================================= -->
			<section id="contact-maps" class="contact-maps-section section">

				<div class="section-background">

					<!-- MAPS BACKGROUND -->
					<div class="section-background-maps">
						<div id="gmap"></div>
				
						<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
						<!-- GOGGLE MAPS CONFIGURATION -->
						<!-- ref: http://maplacejs.com/ -->
						<script>
						var gmap_options = {
							generate_controls : false,
							locations : [{
								lat : 9.077616,
								lon : 7.492041, 
								animation : google.maps.Animation.DROP,
								html : "Drew Headquarter",
								icon : "images/contents/map-1.png",
								clickable : false,
							}],
							map_options : {
								scrollwheel : false,
								mapTypeControl : false,
								streetViewControl : true,
								zoomControlOptions : {
									style : google.maps.ZoomControlStyle.SMALL,
								},
								zoom : 15,
								set_center : [ 9.077616, 7.492041 ], // adjust the "lon" attribute of your first location
							},
							styles : {
								// source: https://snazzymaps.com/style/132/light-gray
								'custom' : [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}],
							},
						};
						</script>
					</div>
				</div>

				<div class="container">
					<div class="contact-maps-row row">
						<div class="col-md-7 col-md-offset-5">

							<div class="contact-maps-box" data-animation="fadeIn">

								<h2 class="section-heading">Contact Us</h2>

								<div class="row">
									<address class="col-sm-6">
										<strong>INEC Headquarters</strong>
										<ul class="fa-ul">
											<li><i class="fa-li fa fa-home"></i>INEC <br> Plot 436 Zambezi Crescent<br>FCT, Abuja<br> NIGERIA</li>
											<li><i class="fa-li fa fa-phone"></i>Phone: 0700-CALL-INEC</li>
											<li><i class="fa-li fa fa-inbox"></i>Email: <a href="mailto:contact@inecnigeria.org"> contact@inecnigeria.org </a></li>
											<li><a href="http://www.inecnigeria.org/?page_id=373" target="_blank" title="State Offices">INEC State Offices</a></li>
										</ul>										
									</address>
								</div>

								<form name="contact" action="http://design.davidrozando.com/drew-html-v1.2/modules/send-email.php" method="post" class="form form-ajax-submit">
									<p><strong>Or drop us a line here:</strong></p>
									<div class="form-validation alert"></div>
									<div class="form-group">
										<input type="text" name="contact-name" class="form-control" placeholder="Your Name">
									</div>
									<div class="form-group">
										<input type="text" name="contact-email" class="form-control" placeholder="Email Address">
									</div>
									<div class="form-group">
										<input type="text" name="contact-subject" class="form-control" placeholder="Subject">
									</div>
									<div class="form-group">
										<textarea name="contact-message" class="form-control" placeholder="Message" rows="5"></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-lg btn-block">Send Message</button>
									</div>
								</form>

							</div>
							
						</div>
					</div>
				</div>

			</section>
<?php get_footer();?>