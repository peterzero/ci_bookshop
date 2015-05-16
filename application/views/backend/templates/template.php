<?php $this->load->view('backend/templates/header'); ?>
<!-- include header -->


<?php $this->load->view('backend/templates/navigation'); ?>
<!-- include navigation -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
<?php $this->load->view('backend/templates/sidebar'); ?>
<!-- include sidebar -->
			<?php $this->load->view($main_content); ?>
<?php $this->load->view('backend/templates/footer'); ?>

