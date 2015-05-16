<section class="inner-md">
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-10 center-block">
				<div class="row info-redirect">
					<div class="col-md-6 col-sm-6 center-block">
						<!-- <div class="progress"> <span class="blue" style="width:0%;"><span>0%</span></span> </div> -->
						<div id="progressTimer"></div>
						<div class="redirect" style="text-align:center;"><p>Trình duyệt sẽ tự chuyển về trang chủ trong 5s...<p><a href="<?php echo base_url();?>">Nhấn vào đây nếu không muốn đơi lâu</a></div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6 center-block">
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
						</div>
					</div>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.content -->
</section>
