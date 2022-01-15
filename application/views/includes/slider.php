<section class="main-banner">
	<div class="main-container">
		<div class="row">
			<div class="col-xl-3 col-md-12 col-sm-12">
				<div class="cat-left">
					<h4>Store Categories</h4>
					<div class="drivercoll">
						<div class="bs-example">
							<div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-left" id="headingleftOne">
										<h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#modems" aria-expanded="true"> <h6> Modems</h6> <i class="fa fa-plus"></i></button></h2>
									</div>
									<div id="modems" class="grey collapse in" aria-labelledby="headingleftOne" data-parent="#accordionExample" aria-expanded="true">
										<div class="card-body">
											<ul>
												<li><a href="#">Modems</a></li>
												<li> <a href="#">2G Modems</a></li>
												<li> <a href="#">3G Modems</a></li>
												<li> <a href="#">4G CAT 1 Modems</a></li>
												<li> <a href="#">CAT M1 &amp; NB-IoT Modems</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-left" id="headingleftTwo">
										<h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#modems2" aria-expanded="true"> <h6> Modem Routers</h6> <i class="fa fa-plus"></i></button></h2>
									</div>
									<div id="modems2" class="grey collapse" aria-labelledby="headingleftTwo" data-parent="#accordionExample" aria-expanded="true">
										<div class="card-body">
											<ul>
												<li><a href="#">3G Modem Routers</a></li>
												<li> <a href="#">4G Modem Routers</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-left" id="headingleftThree">
										<h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#modems3" aria-expanded="true"> <h6> Others</h6> <i class="fa fa-plus"></i></button></h2>
									</div>
									<div id="modems3" class="grey collapse" aria-labelledby="headingleftThree" data-parent="#accordionExample" aria-expanded="true" >
										<div class="card-body">
											<ul>
												<li><a href="#">Customized Solutions</a></li>
												<li> <a href="#">Accessories</a></li>
												<li> <a href="#">Antennas</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-12 col-sm-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
                    <?php
                        if($sliders){
                            foreach($sliders as $slider){
                    ?>
						<div class="carousel-item active"><img class="<?php echo $cssclass;?>" src="<?php echo base_url("uploads/banner/".$slider->banner);?>" alt="tech 1"></div>
						<div class="carousel-item"><img class="<?php echo $cssclass;?>" src="<?php echo base_url("uploads/banner/".$slider->banner);?>" alt="tech 1"></div>
						<div class="carousel-item"><img class="<?php echo $cssclass;?>" src="<?php echo base_url("uploads/banner/".$slider->banner);?>" alt="tech 1"></div>
					<?php }}?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>