<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/dist/css/dist.min.css"></link>
</head>
<body>
	<div id="mainWrap">
		<div id="login">
			<h1>Some System</h1>
			<div id="menu-wrap">
				<form class="form-horizontal" id="regForm" action="<?php echo base_url('signup/process');?>" method="post">
					<h2 class="text-center" id="register-title"><strong>Register</strong></h2>
					
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
								<input type="text" class="form-control input-lg" placeholder="email" name="email" autocomplete="off">
								<p class="help-block"></p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<input type="text" class="form-control input-lg" placeholder="username" name="username" autocomplete="off">
								<p class="help-block"></p>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
								<input type="password" class="form-control input-lg" placeholder="password" name="password" autocomplete="off">
								<p class="help-block"></p>
							</div>
						</div>
					</div>
					
					<div class="form-group formSubmit">
						<div class="col-sm-12 submitWrap">
							<button type="submit" class="btn btn-success hidden-xs">Register</button>
							<button type="submit" class="btn btn-success btn-block visible-xs">Register</button>
						</div>
					</div>
					<div class="form-group formNotice">
						<div class="col-xs-12">
							<p class="hasAccount text-center">Already have an account? <a href="<?php echo base_url() ?>"><span>Log in here</span></a></p>
						</div>
					</div>
				</form>
				
			</div>
		</div>
		<div id="result-area" class="text-center">
		<div id="status-area"><div class="text-danger"><?php echo validation_errors(); ?></div></div>
		<div id="check-name-result-area" class="text-justify"></div>
		</div>
	</div>
	<script rel="text/javascript" src="<?php echo base_url();?>public/vendors/js/jquery.js"></script>
	<script rel="text/javascript" src="<?php echo base_url();?>public/vendors/js/jquery.validate.js"></script>
	<script rel="text/javascript" src="<?php echo base_url();?>public/vendors/js/bootstrap.js"></script>
	<script rel="text/javascript" src="<?php echo base_url();?>public/js/form.validation.js"></script>
	<!--script rel="text/javascript" src="public/vendors/js/require.js" data-main="public/js/main.js"></script-->
	<!--script rel="text/javascript" src="public/dist/js/dist.min.js"></script-->
	
</body>
</html>