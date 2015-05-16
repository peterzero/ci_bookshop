<div class="content wow fadeInUp">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb text-center light-bg">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Login</li>
			</ul><!-- /.breadcrumb -->
		</div><!-- /.row -->
		<section class="login-block wow fadeInUp inner-top-50 animated">

				<div class="col-md-7" >
					<div class="info-login">
                        <div class="col-md-11 col-md-offset-1">
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

                        <?= validation_errors(); ?>
                        </div>
					<form action="<?= site_url('user/login');?>" method="POST" class="form-horizontal" role="form">

						<div class="form-group">
					      <label class="col-md-3 control-label" for="email">Email</label>
					      <div class="col-md-9">
					        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					          <input id="email" name="email" type="text" value="<?php echo set_value('email') ?>" placeholder="Enter Your Email" class="form-control input-md" aria-required="true" aria-describedby="email-error" aria-invalid="false">
					        </div><span id="email-error" class="help-block valid"></span>
					      </div>
					    </div>

					    <div class="form-group">
					      <label class="col-md-3 control-label" for="password">Password</label>
					      <div class="col-md-9">
					        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					          <input id="password" name="password" type="password" placeholder="Enter Your Password" class="form-control input-md" aria-required="true" aria-describedby="password-error" aria-invalid="false">
					        </div><span id="password-error" class="help-block valid"></span>
					      </div>
					    </div>

						<div class="form-group">
						    <div class="checkbox checkbox-primary col-md-9 col-md-offset-3">
						    	<label>
						    		<input type="checkbox" name="remember" value="1">
						    		Remember
						    	</label>
						    </div>
					    </div>
					    <div class="form-group">
							<div class="col-md-9 col-md-offset-3">
								<button type="submit" name="submit_login" class="btn btn-primary">Login</button>
							</div>
						</div>

					</form>
					</div>
					<div id="OR" class="hidden-xs">OR</div>
				</div>  <!-- end col 7-->

				<div class="col-md-5" style="border-left:1px solid #ccc;height:210px;padding-right: 40px">

					<div class="social-login col-md-10 col-md-offset-2">

						<div class="form-group">


								<a class="btn btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Sign in with Google</a>

						</div>
						<div class="form-group">


							<a class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign in with Facebook</a>


						</div>

					</div>
				</div>

		</section>



	</div>
</div>