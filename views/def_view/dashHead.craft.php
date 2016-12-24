<?php ?>
<!Doctype html>
<html lang="en"><head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>Typography - Ace Admin</title>

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
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?=HOME; ?>" class="navbar-brand">
						<small>
							<i class="fa fa-users"></i>
							Joint Hands
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="green dropdown-modal">
							<a class="dropdown-toggle">
								<i class="ace-icon fa fa-user"></i>
								300,535 Users
							</a>
						</li>

						<li class="light-blue dropdown-modal">
							<a aria-expanded="false">
								<span class="user-info">
									<small>Welcome,</small>
									<?=$this->username; ?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">

			<div data-sidebar-hover="true" data-sidebar-scroll="true" data-sidebar="true" id="sidebar" class="sidebar responsive ace-save-state">
				<ul style="top: 0px;" class="nav nav-list">
					<li class="">
						<a href="<?=HOME; ?>/dash">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?=HOME; ?>/dash/profile">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> My Profile</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-gift"></i>
							<span class="menu-text">
								My Referals
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?=HOME; ?>/dash/signups">
									<i class="menu-icon fa fa-caret-right"></i>
									Signups
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text"> My Money</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?=HOME; ?>/dash/pdonation">
									<i class="menu-icon fa fa-caret-right"></i>
									Pending Donations
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?=HOME; ?>/dash/cdonation">
									<i class="menu-icon fa fa-caret-right"></i>
									Incoming Donations
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?=HOME; ?>/dash/bank_detail">
									<i class="menu-icon fa fa-tachometer"></i>
									<span class="menu-text"> Update Bank Details </span>
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="<?=HOME; ?>/dash/settings">
							<i class="menu-icon fa fa-gears"></i>
							<span class="menu-text"> Settings </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?=HOME; ?>/dash/reflink">
							<i class="menu-icon fa fa-link"></i>
							<span class="menu-text"> Referal Link </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?=HOME; ?>/user/logout">
							<i class="menu-icon fa fa-power-off"></i>
							<span class="menu-text"> Logout </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-save-state ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
