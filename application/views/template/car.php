<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistem Informasi Rental Kendaraan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url('public/landing/css/open-iconic-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/landing/css/animate.css') ?>">
    
    <link rel="stylesheet" href="<?=base_url('public/landing/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/landing/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/landing/css/magnific-popup.css') ?>">

    <link rel="stylesheet" href="<?=base_url('public/landing/css/aos.css') ?>">

    <link rel="stylesheet" href="<?=base_url('public/landing/css/ionicons.min.css') ?>">

    <link rel="stylesheet" href="<?=base_url('public/landing/css/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/landing/css/jquery.timepicker.css') ?>">

    
    <link rel="stylesheet" href="<?=base_url('public/landing/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/landing/css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/landing/css/style.css') ?>">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Rental<span>Kendaraan</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="<?=base_url('home/logout')?>" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url('public/landing/images/bg_3.jpg') ?>');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<h1 class="mb-3 bread">Choose Your Car</h1>
			</div>
			</div>
		</div>
    </section>
		

	<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
				<!-- Loop Here -->
				<div class="col-md-12">
					<?= $this->session->flashdata("mess") ?>
				</div>
				<?php foreach($data as $key => $value): ?>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(<?=base_url('public/mobil/'.$value->foto) ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?= $value->nama_merk ?> ( <?= $value->nopol ?> )</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?= $value->produk ?></span>
	    						<p class="price ml-auto"><?= $value->biaya_sewa ?> <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1" data-toggle="modal" data-target="#exampleModal-<?= $value->id ?>">Book now</a></p>
    					</div>
    				</div>
    			</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal-<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form action="<?= base_url('home/rent/'.$value->id) ?>" method="post">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Rent <?= $value->nama_merk ?> ( <?= $value->nopol ?> )</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<label for="">Tanggal Mulai</label>
								<input type="date" name="tanggal_mulai" class="form-control">
								<label for="">Tanggal Akhir</label>
								<input type="date" name="tanggal_akhir" class="form-control">
								<label for="">Tujuan</label>
								<input type="text" name="tujuan" class="form-control">
								<label for="">No KTP</label>
								<input type="text" name="noktp" class="form-control">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Order</button>
							</div>
						</div>
					</form>
				</div>
			</div>
				<?php endforeach; ?>
    		</div>
    	</div>
    </section>
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      	<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2"><a href="#" class="logo">Rental<span>Kendaraan</span></a></h2>
					
					</div>
				</div>
			</div>
      	</div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?=base_url('public/landing/js/jquery.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery-migrate-3.0.1.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/popper.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/bootstrap.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery.easing.1.3.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery.waypoints.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery.stellar.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/owl.carousel.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery.magnific-popup.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/aos.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery.animateNumber.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/bootstrap-datepicker.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/jquery.timepicker.min.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/scrollax.min.js') ?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=base_url('public/landing/js/google-map.js') ?>"></script>
  <script src="<?=base_url('public/landing/js/main.js') ?>"></script>
    
  </body>
</html>