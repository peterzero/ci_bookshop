<div class="footer-content">
	<div class="contact-form-container">
		<div id="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193333!2d80.29172300000002!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1415189477065" ></iframe>
		</div>
		<div class="container">
			<ul class="breadcrumb text-center">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Contact</li>
			</ul><!-- /.breadcrumb -->

			<div class="row inner-top-md">
				<div class='col-md-10 center-block'>
					<div class="contact-block">
						<div class="contact-form-envelope">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-8 col-sm-8">
									<?php //flash messages
						                $flash_message = $this->session->flashdata('flash_message'); if(isset($flash_message) && count($flash_message)){ if($flash_message['type'] == 'success'){ ?>

						                  <div class="alert alert-success">
						                          <a class="close" data-dismiss="alert">×</a>
						                          <?php echo $flash_message['message'];?>
						                   </div>
						                <?php } else if($flash_message['type'] == 'error'){ ?>
						                  <div class="alert alert-danger">
						                          <a class="close" data-dismiss="alert">×</a>
						                          <?php echo $flash_message['message'];?>
						                  </div>
						                <?php } } ?>
						                <?php
						                    $error = validation_errors();
						                    echo (isset($error) && !empty($error))? $error :'';
						                ?>
										<div class="contact-form">
											<form id="contact-form" action="<?php echo base_url(); ?>contact/send_contact" method="POST" class='form-horizontal contact-form'>
												<div class="form-group">
													<label class="control-label col-sm-3 info-title" for="name">Name</label>
													<div class="col-sm-9">
														<input id="name" class="form-control bookshop-form-control" type="text" placeholder="Name" name="name" required>
													</div><!-- /.col -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<label class="control-label col-sm-3 info-title" for="email">Email</label>
													<div class="col-sm-9">
														<input id="email" class="form-control bookshop-form-control" type="email" placeholder="Email" name="email" required>
													</div><!-- /.col -->
												</div><!-- /.form-group -->

												<div class="form-group">
													<label class="control-label col-sm-3 info-title" for="subject">Subject</label>
													<div class="col-sm-9">
														<input id="subject" class="form-control bookshop-form-control" type="text" placeholder="Tiêu đề" name="subject" required>
													</div><!-- /.col -->
												</div><!-- /.form-group -->

												<div class="form-group">
													<label class="control-label col-sm-3 info-title" for="message">Message</label>
													<div class="col-sm-9">
														<textarea id="message" name="message" class="form-control bookshop-form-control" rows="5" required></textarea>
													</div><!-- /.col -->
												</div><!-- /.form-group -->

												<div class="form-group">
													<label class="control-label col-sm-3 info-title sr-only" ></label>
													<div class="col-sm-9">
														<button class="btn-uppercase btn btn-primary " name="submit" type="submit">submit</button>
													</div><!-- /.col -->
												</div><!-- /.form-group -->

											</form>
										</div><!-- /.contact-form -->
									</div><!-- /.col -->
									<div class="col-md-4 col-sm-4">
										<section class="contact-detail">
											<div class="head-office-address">
												<h4 class="title">Head Office</h4>
												<address>
													Lorem Ipsum Dolor Sit Moon Avenue <br>No:11/21 Planet City,Earth
												</address>
												<p class="info"><span>Fax:</span>+1 212 691 1303</p>
												<p class="info"><span>Tel:</span>+1 212 691 6862</p>
												<p class="info"><span>E-mail:</span><a href="index.php?page=contact#">hello@hezy,org</a></p>
											</div>
											<hr>
											<div class="branch-office-address">
												<h4 class="title">Branch Office</h4>
												<address>
													Lorem Ipsum Dolor Sit Moon Avenue <br>No:11/21 Planet City,Earth
												</address>
											</div>
											<hr>
											<div class="social-connection">
												<h4 class="title">Connect with Hezy Theme</h4>
												<ul class="social-connection-list list-inline">
													<li><a href="#"><i class="fa fa-facebook"></i></a></li>
													<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
													<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
													<li><a href="#"><i class="fa fa-twitter"></i></a></li>
													<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
													<li><a href="#"><i class="fa fa-rss"></i></a></li>
													<li><a href="#"><i class="fa fa-instagram"></i></a></li>
												</ul>
											</div>
										</section>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div><!-- /.contact-box -->
						</div><!-- /.contact-form-envelope -->
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.contact-form-container -->
</div><!-- /.content -->