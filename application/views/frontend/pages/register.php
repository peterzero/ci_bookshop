<div class="content wow fadeInUp">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb text-center light-bg">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Register</li>
			</ul><!-- /.breadcrumb -->
		</div><!-- /.row -->
			<section class="register-block wow fadeInUp inner-top-50 animated">
				<form action="<?=base_url()?>user/register" method="POST" class="form-horizontal" role="form">
				<div class="col-md-6">
					<div class="info-person">
						<div class="form-group">
							<legend><i class="fa fa-info"></i>&nbsp;&nbsp;Thông tin cá nhân</legend>
						</div>
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

							<div class="form-group">
								<label for="firstname" class="col-sm-3 control-label">First Name:</label>
								<div class="col-sm-9">
									<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo set_value('firstname') ?>" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="lastname" class="col-sm-3 control-label">Last Name:</label>
								<div class="col-sm-9">
									<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo set_value('lastname') ?>" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="input" class="col-sm-3 control-label">Email:</label>
								<div class="col-sm-9">
								<div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
									<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>" required="required" title="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputTel" class="col-sm-3 control-label">Tel:</label>
								<div class="col-sm-9">
								<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
									<input type="tel" name="tel" id="tel" class="form-control" value="<?php echo set_value('tel') ?>" required="required" title="">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="birthday" class="col-sm-3 control-label">Birthday:</label>
								<div class="col-sm-9">
									<input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo set_value('birthday') ?>" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="col-sm-3 control-label">Sex:</label>
								<div class="radio col-sm-9">
									<label>
										<input type="radio" name="gender" id="input" value="0" checked="checked">
										Nam
									</label>
									<label>
										<input type="radio" name="gender" id="input" value="1">
										Nữ
									</label>
								</div>
							</div>


							<div class="form-group">
							<legend>Password</legend>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-3 control-label">Username:</label>
								<div class="col-sm-9">
								<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
									<input type="text" name="username" id="username" class="form-control" required="required" title="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-sm-3 control-label">Password:</label>
								<div class="col-sm-9">
								<div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input type="password" name="password" id="password" class="form-control" required="required" title="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="re_password" class="col-sm-3 control-label">Re Password:</label>
								<div class="col-sm-9">
								<div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input type="password" name="re_password" id="re_password" class="form-control" required="required" title="">
									</div>
								</div>
							</div>


					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
							<legend>Địa chỉ</legend>
						</div>
						<div class="form-group">
							<label for="company" class="col-sm-3 control-label">Company:</label>
							<div class="col-sm-9">
								<input type="text" name="company" id="company" class="form-control" value="<?php echo set_value('company') ?>" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-3 control-label">Address:</label>
							<div class="col-sm-9">
								<input type="text" name="address" id="address" class="form-control" value="<?php echo set_value('address') ?>" required="required" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="address2" class="col-sm-3 control-label">Address 2:</label>
							<div class="col-sm-9">
								<input type="text" name="address2" id="address2" class="form-control" value="<?php echo set_value('address2') ?>" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="city" class="col-sm-3 control-label">City:</label>
							<div class="col-sm-9">
								<input type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city') ?>" required="required" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="postcode" class="col-sm-3 control-label">Postcode:</label>
							<div class="col-sm-9">
								<input type="number" name="postcode" id="postcode" class="form-control" required="required" title="">
							</div>
						</div>
				</div>
				<div class="clearfix">

				</div>
				<div class="col-md-12 clearfix text-center">
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" class="btn btn-primary">Submit</button>
							<input type="reset" value="Reset" class="btn btn-default">
						</div>
					</div>

				</div>
				</form>
			</section><!-- /.section -->
	</div><!-- /.container -->
</div><!-- /.content -->