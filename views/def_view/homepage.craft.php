		<?=$this->getHomeHeader(); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<!--<div class="main-content">
				<div class="main-content-inner">
					
					<div class="page-content">

						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<!-- PAGE CONTENT BEGINS --
								<div class="row">
									<div class="col-sm-12">
										<img style="max-width: 100%;" src="<?=HOME. '/data/home.jpg'; ?>">
									</div>
								</div>
								<hr>
								<div class="row">
								
								</div>
								<!-- PAGE CONTENT ENDS --
							</div><!-- /.col --
						</div><!-- /.row --
					</div><!-- /.page-content --
				</div>
			</div><!-- /.main-content -->

			<section id="cover">
        <div id="cover-caption">
            <div class="container">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1 class="display-3" style="text-align: center;">Welcome to the Student Information board</h1>
                    <p></p>
                </div>
            </div>
        </div>
    </section>

<style type="text/css">
	#cover {
    background: #222 url('college.jpg') center center no-repeat;
    background-size: cover;
    color: white;
    height: 100%;
    text-align: center;
    display: flex;
    align-items: center;
}

#cover-caption {
    width: 100%;
}

</style>

<section id="news" style="padding: 5rem 0;">
        <div class="section-content">
            <div class="container">
                
                <h3>Latest Notices</h3>
                <p class="lead"></p>
                
                <hr>
                
							<?=$this->noticeRows; ?>
</section>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<?=$this->getHomeFooter(); ?>