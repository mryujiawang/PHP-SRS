<div id="login">
<h1 class="reg">Registration</h1>
<?php $attributes = array('class' => 'loginform', 'id' => 'loginform');?>
<?php echo form_open('admin/registration',$attributes); ?>
<p>
	<?php echo form_label('First Name:','fname')?>
	<?php echo form_input('fname','','id="fname"')?>
	<?php echo form_error('fname', '<span class="error">', '</span>'); ?>
</p>
<p>
	<?php echo form_label('Last Name:','lname')?>
	<?php echo form_input('lname','','id="lname"')?>
	<?php echo form_error('lname', '<span class="error">', '</span>'); ?>
</p>
<p>
	<?php echo form_label('Email Address:','email')?>
	<?php echo form_input('email','','id="email"')?>
	<?php echo form_error('email', '<span class="error">', '</span>'); ?>
</p>
<p>
	<?php echo form_label('Password:','password')?>
	<?php echo form_password('password','','id="password"')?>
	<?php echo form_error('password', '<span class="error">', '</span>'); ?>
</p>
<p>
	<?php echo form_label('Confirm Password:','cpassword')?>
	<?php echo form_password('cpassword','','id="cpassword"')?>
	<?php echo form_error('cpassword', '<span class="error">', '</span>'); ?>
</p>
<p>
	<?php $btn_att = array('class' => 'smbtn')?>
	<?php echo form_submit('submit','Register',$btn_att)?>
</p>
<?php echo form_close();?>
</div>
</body>
</html>