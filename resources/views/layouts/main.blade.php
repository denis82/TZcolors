<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Панель администратора</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!--<link rel="stylesheet" href="{{ secure_asset('assets/admin/css/admin.css')}}">-->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- SEARCH FORM -->

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item">
					<a class="nav-link" href="#" role="button">
						<span class="mr-2">Выйти</span>
						<i class="fas fa-sign-out-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="../../index3.html" class="brand-link">
				<img src="{{ asset('assets/admin/img/AdminLTELogo.png')}}" alt="AdminLTE
						Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Admin</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="{{ asset('assets/admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Master</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="{{ asset('/')}}" class="nav-link">
								<p>
									Список изображений
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ asset('/create')}}" class="nav-link">
								<p>
									Добавить изображение
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="container-fluid mt-2">
				<div class="row">
					<div class="col-12">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul class="list-unstyled">
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if (session()->has('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif
						@if( session()->has('error'))
						<div class="alert alert-danger">
							{{ session('error')}}
						</div>
						@endif
					</div>
				</div>
			</div>
			@yield('content')
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.1.0-rc
			</div>
			<strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
		</footer>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>

	<!--<script src="{{ secure_asset('assets/admin/js/admin.js')}}"></script>-->
	<script src="{{ asset('assets/admin/js/admin.js')}}"></script>
	<script>
		$('.nav-sidebar a').each(function() {
			let location = window.location.protocol + '//' + window.location.host +
				window.location.pathname;
			let link = this.href;

			if (link == location) {
				$(this).addClass('active');
				$(this).closest('.has-treeview').addClass('menu-open');
			}
		});


		$(function() {
			bsCustomFileInput.init();
			$('#reservationdate').datetimepicker({
				format: "yyyy-mm-DD"
			});
			$('#summernote').summernote({
				height: 400
			});
		});


		var HelloButton = function(context) {
			var ui = $.summernote.ui;

			// create button
			var button = ui.button({
				contents: '<i class="fa fa-tag"/> Fig',
				tooltip: 'hello',

				styleTags: [
					'p',
					{
						title: 'Blockquote',
						tag: 'blockquote',
						className: 'blockquote',
						value: 'blockquote'
					},
					'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
				],
				click: function() {
					// invoke insertText method with 'hello' on editor module.
					var mig = document.createElement('figcaption');
					context.invoke('editor.insertNode', mig);
				}
			});
			return button.render(); // return button as jquery object
		}
		$('#summernote').summernote({
			toolbar: [
				['mybutton', ['hello']],

				['insert', ['picture', 'link', 'video', 'table']],
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize', 'fontname']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph', 'style']],
				['height', ['height', 'codeview']],

			],
			buttons: {
				hello: HelloButton
			}
		});

		$(function() {
			var today = new Date();
			$('#reservation').daterangepicker({
				"startDate": today,
				locale: {
					format: 'YYYY-MM-DD'
				}
			});
		})
	</script>
</body>

</html>
