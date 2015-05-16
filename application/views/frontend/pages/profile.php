<div class="content wow fadeInUp">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb text-center light-bg">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Profile</li>
			</ul><!-- /.breadcrumb -->
		</div><!-- /.row -->

		<div class="container">
		  <h1 class="page-header">Edit Profile</h1>
		  <div class="row">
		    <!-- left column -->
		    <div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="text-center">
		      <?php if(!empty($user_info['avatar'])){
		      		$avatar = $user_info['avatar'];
		       }else{
		       		$avatar = 'default-avatar.png';
		       }
		       ?>
		      <form action="" method="POST" id="form_upload" class="form-horizontal" role="form" enctype="multipart/form-data">
					<div class="show_img"><img src="<?php echo base_url() ?>upload/avatars/<?=$avatar?>" class="avatar img-circle img-thumbnail img-responsive" alt="avatar"></div>
		        	<h6>Upload a different photo...</h6>
		        	<input type="hidden" name="uid" id="uid" value="<?= $user_info['id'] ?>">
		        	<input type="file" name="avatar" id="avatar" class="text-center center-block well well-sm"><img class="loading" src="<?=base_url('assets/home/images/ajax-loader.gif')?>" style="display: none;">
		      		<div class="form-group">
		      			<div class="col-sm-12">
		      				<button type="submit" id="upload_avatar" class="btn btn-success">upload</button>
		      			</div>
		      		</div>
		      </form>

		      </div>
				<nav class="nav-sidebar">
					<ul class="nav tabs" id="sidemenu">
					  <li>
					    <a href="#profile-content" class="open"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
					  </li>

					  <li>
					    <a href="#contact-content"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Contact</a>
					  </li>
					  <li>
					    <a href="#wishlist-content"><i class="fa fa-heart"></i>&nbsp;&nbsp;Wishlist</a>
					  </li>
					</ul>
				</nav>
		      <!-- /tab-->
		    </div>
		    <!-- edit form column -->
		    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
		    	<div id="content">
    				<div id="profile-content" class="contentblock">
		      <div class="alert alert-info alert-dismissable" style="display: none">
		        <a class="panel-close close" data-dismiss="alert">×</a>
		        <div class="result"></div>
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
		      <h3>Personal info</h3>



		      <form class="form-horizontal" role="form" action="<?= base_url('user/update_profile')?>" method="POST">
		      
		        <div class="form-group">
		          <label class="col-lg-3 control-label">First name:</label>
		          <div class="col-lg-8">
		            <input class="form-control" name="firstname" id="firstname" value="<?= $user_info['firstname'] ?>" type="text">
		          </div>
		        </div>
		        <div class="form-group">
		          <label class="col-lg-3 control-label">Last name:</label>
		          <div class="col-lg-8">
		            <input class="form-control" name="lastname" id="lastname" value="<?= $user_info['lastname'] ?>" type="text">
		          </div>
		        </div>
		        <div class="form-group">
					<label for="inputTel" class="col-lg-3 control-label">Tel:</label>
					<div class="col-lg-8">
					<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
						<input type="tel" name="tel" id="tel" class="form-control" value="<?= $user_info['tel'] ?>" required="required" title="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="sex" class="col-lg-3 control-label">Sex:</label>
					<div class="radio col-lg-8">
						<label>
							<input type="radio" name="gender" value="0" <?= $user_info['gender'] == 0 ? 'checked="checked"' : ''?>>
							Nam
						</label>
						<label>
							<input type="radio" name="gender" value="1" <?= $user_info['gender'] == 1 ? 'checked="checked"' : ''?>>
							Nữ
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="date" class="col-sm-3 control-label">Birthday:</label>
					<div class="col-sm-8">
						<input type="date" name="birthday" id="birthday" class="form-control" value="<?= $user_info['birthday'] ?>" required="required" title="">
					</div>
				</div>

		        <div class="form-group">
		          <label class="col-lg-3 control-label">Email:</label>
		          <div class="col-lg-8">
		          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		            <input class="form-control" name="email" id="email" value="<?= $user_info['email'] ?>" type="email" disabled>
		            </div>
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-md-3 control-label">Username:</label>
		          <div class="col-md-8">
		          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
		            <input class="form-control" name="username" id="username" value="<?= $user_info['username'] ?>" type="text">
		           </div>
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-md-3 control-label"></label>
		          <div class="col-md-8">
		            <input class="btn btn-primary" name="submit_info" value="Save Changes" type="submit">
		            <span></span>
		            <input class="btn btn-default" value="Cancel" type="reset">
		          </div>
		        </div>
		      </form>
                        <form class="form-horizontal" action="<?= base_url('user/changepass')?>" method="POST" role="form">
                            <div class="form-group">
                                <legend><i class="fa fa-key"></i>&nbsp;&nbsp;Change Password</legend>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password:</label>
                                <div class="col-md-8">
                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                        <input class="form-control" name="password" value="" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password:</label>
                                <div class="col-md-8">
                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                        <input class="form-control" name="new_password" value="" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password:</label>
                                <div class="col-md-8">
                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                        <input class="form-control" name="re_password" value="" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" name="changepass" value="Change Password" type="submit">
                                    <span></span>
                                </div>
                            </div>
                        </form>

		      </div>
		      	<!-- #contact-content -->
		      <div id="contact-content" class="contentblock hidden">
		          <h3>Contact info</h3>
		          <form class="form-horizontal" role="form">
			         <div class="form-group">
			          <label class="col-lg-3 control-label">Company:</label>
			          <div class="col-lg-8">
			            <input class="form-control" name="company" value="<?= $user_info['company'] ?>" type="text">
			          </div>
			        </div>
		          	<div class="form-group">
							<label for="address" class="col-sm-3 control-label">Address:</label>
							<div class="col-sm-8">
								<input type="text" name="address" id="address" class="form-control" value="<?= $user_info['address'] ?>" required="required" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="address2" class="col-sm-3 control-label">Address 2:</label>
							<div class="col-sm-8">
								<input type="text" name="address2" id="address2" class="form-control" value="<?= $user_info['address2'] ?>" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="city" class="col-sm-3 control-label">City:</label>
							<div class="col-sm-8">
								<input type="text" name="city" id="city" class="form-control" value="<?= $user_info['city'] ?>" required="required" title="">
							</div>
						</div>
						<div class="form-group">
							<label for="postcode" class="col-sm-3 control-label">Postcode:</label>
							<div class="col-sm-8">
								<input type="number" name="postcode" value="<?= $user_info['postcode'] ?>" id="postcode" class="form-control" required="required" title="">
							</div>
						</div>
						<div class="form-group">
				          <label class="col-md-3 control-label"></label>
				          <div class="col-md-8">
				            <input name="submit" class="btn btn-primary" value="Save Changes" type="button">
				            <span></span>
				            <input class="btn btn-default" value="Cancel" type="reset">
				          </div>
				        </div>
		          </form>
		       </div><!-- @end #contact-content -->

		       	<!-- #wishlist-content -->
		      <div id="wishlist-content" class="contentblock hidden">
		          <h3>Wishlist</h3>

		       </div><!-- @end #wishlist-content -->
		      </div>
		    </div> <!-- col-md-8 -->
		  </div>

		</div> <!-- container -->

</div> <!-- container -->
</div>
