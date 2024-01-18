<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title><?php echo $this->config->item('app_name') ?> | Data Transaksi Siswa</title>
	<link rel="icon" type="image/png" href="<?php echo media_url('img/mipa_logo.png') ?>">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/frontend-style.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/load-font-googleapis.css">
	<script src="<?php echo media_url() ?>/js/jquery.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="col-md-12">
			<?php if (isset($setting_school) and $setting_school['setting_value'] == '-') { ?>
				<a class="navbar-brand" href="<?php echo site_url(); ?>"><span class='fa fa-google-wallet' aria-hidden='true'></span>&nbsp;<b> <?php echo $this->config->item('app_name') ?></b></a>
			<?php } else { ?>
				<a class="navbar-brand" href="<?php echo site_url(); ?>"><span class='fa fa-google-wallet' aria-hidden='true'></span>&nbsp;<b> <?php echo $this->config->item('app_name') ?></b></a>
			<?php } ?>
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-main">
					<ul class="nav navbar-nav mr-auto">
					</ul>
				</div>
			</div>
		</div>
	</nav><br><br><br>
	<div class="col-md-12 margin-bottom pad">
		<?php $this->load->view('frontend/home') ?>
	</div>
	<?php $this->load->view('frontend/footer') ?>
	</div>
	<script src="<?php echo media_url() ?>/js/bootstrap.min.js">
	</script>
</body>

</html>