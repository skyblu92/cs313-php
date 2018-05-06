<!DOCTYPE HTML>
<html>
	<head>
		<title>Skyler's homepage</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>CS 313</strong></a>
									<ul class="icons">
										<li><a href="https://www.facebook.com/skyler.blumenthal" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="www.linkedin.com/in/skyler-blumenthal-a93996109" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Hello World</h1>
											<p>Skyler's page</p>
										</header>
										<p>Welcome to my page. I love engineering in general (not just of the software variety!) and love to learn how things work. I'm currently pursuing a Bachelor's degree in Software Engineering/Automotive Engineering. If you have car questions, I'm the guy to ask! I also love shooting guns at the range, video games, and cooking!</p>
										<?php
											date_default_timezone_set('America/Chicago');
											$current_date = date('d/m/Y | H:i:s');
											echo "<p><strong>date/time page was loaded (PHP test) - $current_date</strong></p>";
										?>
										<ul class="actions">
											<li><a href="#" class="button big">Learn More</a></li>
										</ul>
									</div>
									<span class="image object">
										<img src="images/pic10.jpg" alt="" />
									</span>
								</section>


							<!-- Section -->
								

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search here (if this worked)" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Homepage</a></li>
										<li><a href="generic.html">Homework/assignments</a></li>
										<li><a href="elements.html">Other menu (WIP)</a></li>
										<li>
											<span class="opener">Submenu (WIP)</span>
											<ul>
												<li><a href="#">Testing</a></li>
												<li><a href="#">Testing1</a></li>
												<li><a href="#">Testing2</a></li>
												<li><a href="#">Testing3</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Another Submenu (WIP)</span>
											<ul>
												<li><a href="#">Lorem Dolor</a></li>
												<li><a href="#">Ipsum Adipiscing</a></li>
												<li><a href="#">Tempus Magna</a></li>
												<li><a href="#">Feugiat Veroeros</a></li>
											</ul>
										</li>
									</ul>
								</nav>
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">All rights reserved. To me. Because I'm awesome.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>