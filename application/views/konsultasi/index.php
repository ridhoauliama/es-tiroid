<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" href="<?= base_url('assets'); ?>/img/logo-1.png">

	<title><?= $judul; ?> </title>
	<!-- Simple Bar CSS -->
	<link href="<?= base_url('assets'); ?>/vendors/light/css/simplebar.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- Icon CSS -->
	<link href="<?= base_url('assets'); ?>/vendors/light/css/feather.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/select2.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/dropzone.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/uppy.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/jquery.steps.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/jquery.timepicker.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/quill.snow.css" rel="stylesheet">
	<!-- Date Range Picker CSS-->
	<link href="<?= base_url('assets'); ?>/vendors/light/css/daterangepicker.css" rel="stylesheet">
	<!-- App CSS -->
	<link href="<?= base_url('assets'); ?>/vendors/light/css/app-light.css" rel="stylesheet" id="lightTheme">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/app-dark.css" rel="stylesheet" id="darkTheme" disabled>
</head>

<body class="horizontal light">
	<div class="wrapper">
		<main role="main" class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class=" col-8">
						<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
							<div class="container-fluid">
								<a class="navbar-brand mx-lg-1 mr-0" href="<?= base_url() ?>">
									<img src="<?= base_url('assets') ?>/img/logo-1.png" width="40" alt="Logo" class="d-inline-block">
									<span>Diagnosa Penyakit Tiroid Pada Manusia</span>
								</a>
								<ul class="navbar-nav d-flex flex-row">
									<li class="nav-item">
										<a class="nav-link text-muted my-2" href="<?= base_url('home') ?>">
											<i class="fe fe-x-circle fe-16"></i> Close Form
										</a>
									</li>
								</ul>
							</div>
						</nav>
						<div class="card shadow mb-4">
							<div class="card-header text-center">
								<h5 class="page-title mb-0">Form Konsultasi</h5>
							</div>
							<div class="card-body">
								<strong class="card-title">Data diri :</strong>
								<form action="<?= base_url('diagnosa/hasil') ?>" method="post" class="needs-validation" novalidate>
									<?php
									if (date('l') == 'Monday') {
										$hari = 'SN';
									} else if (date('l') == 'Tuesday') {
										$hari = 'SL';
									} else if (date('l') == 'Wednesday') {
										$hari = 'RB';
									} else if (date('l') == 'Thursday') {
										$hari = 'KM';
									} else if (date('l') == 'Friday') {
										$hari = 'JM';
									} else if (date('l') == 'Saturday') {
										$hari = 'SB';
									} else if (date('l') == 'Sunday') {
										$hari = 'MG';
									}
									$t = microtime(true);
									$micro = sprintf("%06d", ($t - floor($t)) * 1000000);
									$d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));
									$no_diag = $hari . '-' . $d->format("dmY-His-u");
									?>
									<input type="hidden" name="id_konsultasi" value="<?= $no_diag ?>">
									<div class="form-row mt-2">
										<div class="col-md-12 mb-3">
											<label for="nama">Nama Lengkap</label>
											<input type="text" class="form-control" id="nama" name="nama" required />
											<div class="invalid-feedback"> **Wajib diisi !!** </div>
										</div>
									</div> <!-- /.form-row -->
									<div class="mb-3">
										<p class="mb-2">Jenis Kelamin</p>
										<div class="form-row">
											<div class="col-md-6">
												<div class="custom-control custom-radio">
													<input type="radio" class="custom-control-input" id="lakilaki" value="Laki-laki" name="jk" required />
													<label class="custom-control-label" for="lakilaki">Laki-laki</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" class="custom-control-input" id="perempuan" value="Perempuan" name="jk">
													<label class="custom-control-label" for="perempuan">Perempuan</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label for="usia">Usia</label>
											<input type="number" class="form-control" id="usia" name="usia" maxlength="2" min="5" required />
											<div class="invalid-feedback"> **Wajib diisi !!** </div>
										</div>
									</div> <!-- /.form-row -->
									<strong class="card-title">Pilih Gejala yang Anda alami :</strong>
									<div class="form-group mt-2">
										<?php $i = 1;
										foreach ($gejala as $key) : ?>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="invalidCheck<?= $i ?>" name="gejala_<?= $i ?>" value="<?= $key['kode_gejala'] ?>">
												<label class="form-check-label" for="invalidCheck<?= $i ?>"> <?= $key['kode_gejala'] ?> - <?= $key['nama_gejala'] ?></label>
												<div class="invalid-feedback">**Ceklis minimal 1 data gejala !!**</div>
											</div>
										<?php $i++;
										endforeach; ?>
									</div>
									<hr>

									<div class="row">
										<div class="col">
											<button class="btn btn-primary mr-auto" type="submit">Proses Diagnosa</button>
										</div>
										<div class="col-auto">
											<button class="btn btn-warning" type="submit">Reset</button>
										</div>
									</div>
								</form>
							</div> <!-- /.card-body -->
						</div> <!-- /.card -->
					</div> <!-- /.col -->
				</div> <!-- end section -->
			</div> <!-- /.col-12 col-lg-10 col-xl-10 -->
		</main>
	</div>

	<script src="<?= base_url('assets') ?>/vendors/light/js/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/popper.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/moment.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/simplebar.min.js"></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/daterangepicker.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.stickOnScroll.js'></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/tinycolor-min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/config.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/d3.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/topojson.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/datamaps.all.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/datamaps-zoomto.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/datamaps.custom.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/Chart.min.js"></script>
	<script>
		/* defind global options */
		Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
		Chart.defaults.global.defaultFontColor = colors.mutedColor;
	</script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/gauge.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/jquery.sparkline.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/apexcharts.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/apexcharts.custom.js"></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.mask.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/select2.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.steps.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.validate.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.timepicker.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/dropzone.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/uppy.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/quill.min.js'></script>
	<script>
		$('.select2').select2({
			theme: 'bootstrap4',
		});
		$('.select2-multi').select2({
			multiple: true,
			theme: 'bootstrap4',
		});
		$('.drgpicker').daterangepicker({
			singleDatePicker: true,
			timePicker: false,
			showDropdowns: true,
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		$('.time-input').timepicker({
			'scrollDefault': 'now',
			'zindex': '9999' /* fix modal open */
		});
		/** date range picker */
		if ($('.datetimes').length) {
			$('.datetimes').daterangepicker({
				timePicker: true,
				startDate: moment().startOf('hour'),
				endDate: moment().startOf('hour').add(32, 'hour'),
				locale: {
					format: 'M/DD hh:mm A'
				}
			});
		}
		var start = moment().subtract(29, 'days');
		var end = moment();

		function cb(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);
		cb(start, end);
		$('.input-placeholder').mask("00/00/0000", {
			placeholder: "__/__/____"
		});
		$('.input-zip').mask('00000-000', {
			placeholder: "____-___"
		});
		$('.input-money').mask("#.##0,00", {
			reverse: true
		});
		$('.input-phoneus').mask('(000) 000-0000');
		$('.input-mixed').mask('AAA 000-S0S');
		$('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
			translation: {
				'Z': {
					pattern: /[0-9]/,
					optional: true
				}
			},
			placeholder: "___.___.___.___"
		});
		// editor
		var editor = document.getElementById('editor');
		if (editor) {
			var toolbarOptions = [
				[{
					'font': []
				}],
				[{
					'header': [1, 2, 3, 4, 5, 6, false]
				}],
				['bold', 'italic', 'underline', 'strike'],
				['blockquote', 'code-block'],
				[{
						'header': 1
					},
					{
						'header': 2
					}
				],
				[{
						'list': 'ordered'
					},
					{
						'list': 'bullet'
					}
				],
				[{
						'script': 'sub'
					},
					{
						'script': 'super'
					}
				],
				[{
						'indent': '-1'
					},
					{
						'indent': '+1'
					}
				], // outdent/indent
				[{
					'direction': 'rtl'
				}], // text direction
				[{
						'color': []
					},
					{
						'background': []
					}
				], // dropdown with defaults from theme
				[{
					'align': []
				}],
				['clean'] // remove formatting button
			];
			var quill = new Quill(editor, {
				modules: {
					toolbar: toolbarOptions
				},
				theme: 'snow'
			});
		}
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
	<script>
		var uptarg = document.getElementById('drag-drop-area');
		if (uptarg) {
			var uppy = Uppy.Core().use(Uppy.Dashboard, {
				inline: true,
				target: uptarg,
				proudlyDisplayPoweredByUppy: false,
				theme: 'dark',
				width: 770,
				height: 210,
				plugins: ['Webcam']
			}).use(Uppy.Tus, {
				endpoint: 'https://master.tus.io/files/'
			});
			uppy.on('complete', (result) => {
				console.log('Upload complete! We’ve uploaded these files:', result.successful)
			});
		}
	</script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/apps.js"></script>
</body>

</html>
