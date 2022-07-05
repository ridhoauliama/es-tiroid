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
									<span class="ml-2">Diagnosa Penyakit Tiroid Pada Manusia</span>
								</a>
							</div>
						</nav>
						<div class="card shadow mb-4">
							<div class="card-header text-center">
								<h5 class="page-title mb-0">Hasil Diagnosa</h5>
							</div>
							<div class="card-body">
								<p class="mb-0"><?= $hasil['id_hasil'] ?></p>
								<p class="mb-3"><?= $hasil['tanggal'] ?></p>
								<strong class="card-title">Nama Lengkap :</strong>
								<p class="mb-1"><?= $hasil['nama_user'] ?></p>
								<strong class="card-title">Usia :</strong>
								<p class="mb-1"><?= $hasil['usia'] . ' Tahun' ?></p>
								<strong class="card-title">Jenis Kelamin :</strong>
								<p class="mb-1"><?= $hasil['jk'] ?></p>
								<strong class="card-title">Gejala yang dipilih :</strong>
								<?php
								$inc = strlen($hasil['kode_gejala']) / 2;
								$gejala = $this->Gejala_model->getAllGejala();
								$start = 0;
								for ($i = 1; $i <= $inc; $i++) {
									$g = 'G' . substr($hasil['kode_gejala'], $start, 2);
									$gejala = $this->db->get_where('tbl_gejala', ['kode_gejala' => $g])->row_array();
								?>
									<p class="mb-1"><?= $gejala['kode_gejala'] ?> - <?= $gejala['nama_gejala'] ?></p>
								<?php
									$start += 2;
								}
								?>
								<?php $penyakit = $this->db->get_where('tbl_penyakit', ['kode_penyakit' => $hasil['kode_penyakit']])->row_array(); ?>
								<strong class="card-title">Hasil diagnosa :</strong>
								<p class="mb-1 text-justify">
									Berdasarkan gejala yang dipilih, Anda mengalami jenis penyakit berupa <strong><?= $penyakit['nama_penyakit'] ?> (<?= $hasil['kode_penyakit'] ?>)</strong> dengan tingkat persentase kemungkinan sebesar <strong><?= str_pad(substr(($hasil['hasil_probabilitas'] * 100), 0, 5), 2, '0'); ?> %</strong>.
								</p>
								<strong class="card-title">Solusi :</strong>
								<p class="mb-1 text-justify"><?= $penyakit['solusi'] ?></p>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col">
										<a href="<?= base_url('konsultasi') ?>" class="btn btn-primary mt-2">
											<i class="fe fe-refresh-ccw"></i> Konsultasi Ulang
										</a>
									</div>
									<div class="col-auto">
										<a target="_blank" href="<?= base_url('konsultasi/printHasil?id=' . $this->session->userdata('id_konsultasi')) ?>" class="btn btn-success mt-2">
											<i class="fe fe-download"></i> Hasil Konsultasi (.pdf)
										</a>
									</div>
								</div>
							</div>
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
