<div id="login">
	<?php echo form_open('', array('class' => 'login_box')) ?>
		
		<div class="logo_login">
			<img src="<?php echo base_url() . 'assets/images/byteforce.png'?>" alt="">
			<h2>Byteforce Solutions</h2>
		</div>

		<?php if($this->session->flashdata('message')): ?>
		
			<div class="error">
				<h2><?php echo $this->session->flashdata('message'); ?></h2>
			</div>

		<?php endif; ?>
		

		<?php echo form_label('Email','identity');?>
		<?php echo form_error('identity');?>
		<?php echo form_input('identity','','');?>
		
		<?php echo form_label('Password','password');?>
		<?php echo form_error('password');?>
		<?php echo form_password('password','','class="form-control"');?>

		<label>
		<?php echo form_checkbox('remember','1',FALSE);?> Remember me
		</label>

		<?php echo form_submit('submit', 'Log in', '');?>
	<?php echo form_close() ?>
</div>