<div id="dialog">
<h1 style="padding-top:5px" class="reg">Add New Priority</h1>
<?php $attributes = array('class' => 'loginform', 'id' => 'loginform');?>
<?php echo form_open('priority/create',$attributes); ?>
<p>
	<?php echo form_label('Priority Name:','pname')?>
	<?php echo form_input('pname','','id="pname"')?>
	<?php echo form_error('pname', '<span class="error">', '</span>'); ?>
</p>
<p>
	<?php echo form_label('Description:','pdesc')?>
	<?php echo form_textarea('pdesc','',array('id' => 'pdesc', 'rows' => '10','cols'=>'20'))?>
	<?php echo form_error('pdesc', '<span class="error">', '</span>'); ?>
</p>
<p>
	<a class='smbtn'>Register</a>
</p>
<?php echo form_close();?>
</div>
</body>
</html>

<script>
$('.smbtn').click(function(){
	submit();
	 return false; });

function submit() {
	var p = {};
	p['pname'] = $('#pname').val();
	p['pdesc'] = $('#pdesc').val();
    $('#home_dialog').load('<?php echo base_url();?>priority/create',p,function(str){

	 });
	 
}

</script>