<?=$this->getHomeHeader(); ?>
	<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">

							<div class="position-relative">
								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h2 class="center header green lighter bigger">
												<i class=" ace-icon fa fa-users blue"></i>
												New User Registration
											</h2>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>
											<?=$this->get('notify'); ?>
											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="Your Full Name" type="text" name="name">
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="Username" type="text" name="username">
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="Password" type="password" name="password">
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="Repeat password" type="password">
														</span>
													</label>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="Your School" type="text" name="school">
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="Your Department" type="text" name="department">
														</span>
													</label>

													<!--<label class="block">
														<input class="ace" type="checkbox">
														<span class="lbl">
															I agree to the
															<a target="_blank" href="<?=HOME; ?>/page/terms">Terms and Conditions</a>
														</span>
													</label>-->

													<div class="space-24"></div>

													<div class="clearfix">

														<button name="signup" type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="<?=HOME; ?>/user/login" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div>
<?=$this->getHomeFooter(); ?>