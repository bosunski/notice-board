<?php ?>
<!Doctype html>
<html lang="en"><head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title><?=$this->get('title'); ?></title>

		<meta name="description" content="This is page-header (.page-header > h1)">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/font-awesome/4.5.0/css/font-awesome.min.css">

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/prettify.min.css">

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/fonts.googleapis.com.css">

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style">

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/ace-skins.min.css">
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/ace-rtl.min.css">
		<link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/added.css">

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?=HOME; ?>/views/def_view/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?=HOME; ?>/views/def_view/assets/js/ace-extra.min.js"></script><style>@keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-moz-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-webkit-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-ms-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-o-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}.ace-save-state{animation-duration:10ms;-o-animation-duration:10ms;-ms-animation-duration:10ms;-moz-animation-duration:10ms;-webkit-animation-duration:10ms;animation-delay:0s;-o-animation-delay:0s;-ms-animation-delay:0s;-moz-animation-delay:0s;-webkit-animation-delay:0s;animation-name:nodeInserted;-o-animation-name:nodeInserted;-ms-animation-name:nodeInserted;-moz-animation-name:nodeInserted;-webkit-animation-name:nodeInserted}</style>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?=HOME; ?>/views/def_view/assets/js/html5shiv.min.js"></script>
		<script src="<?=HOME; ?>/views/def_view/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body style="" class="skin-1">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">

				<div class="navbar-header pull-left">
					<a href="<?=HOME; ?>" class="navbar-brand">
						<small>
							<i class="fa fa-post"></i>
							NOTICE BOARD
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<!-- I will add Swapping btw Login/Logout when a user is already logged in -->
						<li class="grey dropdown-modal dark">
							<a href="<?=HOME; ?>/user/login">
								LOGIN
							</a>
						</li>


						<li class="grey dropdown-modal dark">
							<a href="<?=HOME; ?>/user/signup">
								SIGN UP
							</a>
						</li>
				</div>
			</div><!-- /.navbar-container -->
		</div>