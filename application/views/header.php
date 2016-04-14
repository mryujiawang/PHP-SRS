<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 	 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet"  href="<?php echo asset_url().'css/style.css'?>" type="text/css" media="all">
	<title><?php echo $title;?></title>
</head>
<body>
<?php if ($title == "IEHealth Login Page" or $title == "Add New Priority Page"){} else {?>
	<div id="menu">
		<div class="menu_logo">
			<a href="<?php echo base_url().'welcome'; ?>">
				<img src="<?php echo asset_url().'/img/logo.png'?>"/>
			</a>
		</div>
		<div class="nav_menu">
			<?php if (isset($_SESSION['username'])){?>
				<div class="menu_user">
					<?php echo "Welcome, ".ucfirst($_SESSION['firstname'])." ".ucfirst($_SESSION['lastname'])."." ;?>
				</div>
			<?php }?>
			<ul>
				<li><?php echo anchor('admin/logout', 'Logout', 'title="Logout"');?></li>
				<li><?php echo anchor('report', 'Report Generating', 'title="Report"');?></li>
				<li><?php echo anchor('registration', 'Register New User', 'title="Register"');?></li>
				<li><?php echo anchor('welcome','Home Page','class="current"')?></li>
				<li><?php echo anchor('dashboard','Dash Board','title="Dash Board"')?></li>
			</ul>
		</div>
	</div>
<?php }?>