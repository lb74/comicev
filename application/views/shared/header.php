<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>ComicEV</title>

	<!-- Bootstrap -->
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/themes/css/normalize.css">
    <link rel="stylesheet" href="public/themes/css/style.css">
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	 <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<header class="header">
			<!--main menu-->
			<nav class="navbar navbar-default" style="margin-bottom: 0px;">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="http://localhost:8888/">ComicEV</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="main-menu">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thể loại<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<?php
								 		//thanh phan menu
										foreach ($type_arr as $type) {
											$name = hexToStr($type["type_name"]);
											$code = $type["type_code"];
											echo "<li><a href='?page=type&type=$code'>$name</a></li>";
										}
										?>
									</ul>
								</li>
								<li><a href="#">About</a></li>
							</ul>
							<form class="navbar-form navbar-right">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search">
								</div>
								<button type="submit" class="btn btn-default">Search</button>
							</form>

						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
			</nav>
			<!--  end navbar -->
		</header>
	<div class="container wrapper">
		<section>