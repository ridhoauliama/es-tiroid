<div class="preloader">
	<div class="loader">
		<div class="ytp-spinner">
			<div class="ytp-spinner-container">
				<div class="ytp-spinner-rotator">
					<div class="ytp-spinner-left">
						<div class="ytp-spinner-circle"></div>
					</div>
					<div class="ytp-spinner-right">
						<div class="ytp-spinner-circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<header class="header-area mb-0">
	<div class="navbar-area headroom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand" href="#home">
							<img src="<?= base_url('assets') ?>/img/logo-1.png" width="70" alt="Logo" class="d-inline-block">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
							<ul id="nav" class="navbar-nav mr-auto">
								<li class="nav-item active">
									<a href="#home"><i class="fas fa-home"></i> Home</a>
								</li>
								<li class="nav-item">
									<a href="#about"><i class="fas fa-lightbulb"></i> About</a>
								</li>
							</ul>
						</div>
						<div class="navbar-btn d-none d-sm-inline-block">
							<a class="main-btn main-btn-2" href="<?= base_url('konsultasi') ?>">
								Konsultasi
							</a>
							<a class="main-btn" href="<?= base_url('auth') ?>">
								Login
							</a>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url(assets/home/images/header-hero.jpg)">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="header-hero-content">
						<h5 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<b>Sistem Pakar Diagnosa<br>
								<span> Penyakit Tiroid </span><br>
								Pada Manusia
							</b>
						</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
			<div class="image-fluid">
				<img src="<?= base_url('assets') ?>/home/images/hero-image.png" width="100%" alt="Hero Image">
			</div>
		</div>
	</div>
</header>

<section id="about" class="about-area pt-70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
					<h3 class="title">
						<span><b>Apa itu?<br>Penyakit Tiroid?</b>
						</span>
					</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="about-image mt-40 wow fadeIn text-center" data-wow-duration="1s" data-wow-delay="0.8s">
					<img src="assets/home/images/about.png" width="40%" alt="about">
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="about-content pt-45">
					<div class="service-wrapper mt-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
						<div class="row no-gutters justify-content-center">
							<div class="col-lg-12">
								<div class="single-service d-flex">
									<div class="service-content media-body">
										<h4 class="service-title">Penyakit Tiroid</h4>
										<p class="text-justify">adalah gangguan yang disebabkan oleh kelainan bentuk atau fungsi kelenjar tiroid. Penyakit yang lebih sering terjadi pada wanita ini bukan tergolong penyakit yang menular. Kelenjar tiroid adalah kelenjar yang terletak di leher. Kelenjar ini berfungsi untuk menghasilkan hormon tiroid yang mengatur metabolisme tubuh. Gangguan pada kelenjar tiroid dan hormon tiroid akan menimbulkan gejala penyakit tiroid yang bisa berbeda-beda, tergantung jenis dan penyebabnya.</p>
									</div>
									<div class="shape shape-1">
										<img src="assets/home/images/shape/shape-1.svg" alt="shape">
									</div>
									<div class="shape shape-3">
										<img src="assets/home/images/shape/shape-3.svg" alt="shape">
									</div>
									<div class="shape shape-5">
										<img src="assets/home/images/shape/shape-2.svg" alt="shape">
									</div>
									<div class="shape shape-4">
										<img src="assets/home/images/shape/shape-4.svg" alt="shape">
									</div>
									<div class="shape shape-5">
										<img src="assets/home/images/shape/shape-5.svg" alt="shape">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center mb-3">
								<a href="<?= base_url('konsultasi'); ?>" class="main-btn main-btn-2">Konsultasi Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
