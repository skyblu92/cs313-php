<?php
try
{
    $dbUrl = getenv('DATABASE_URL');
    $dbopts = parse_url($dbUrl);
    
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Skyler's assignments page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>CS 313</strong> Skyler Blumenthal</a>
									<ul class="icons">
										<li><a href="https://www.facebook.com/skyler.blumenthal" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="https://www.linkedin.com/in/skyler-blumenthal-a93996109" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
									</ul>
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>SCRIPTURES</h1>
										<?php
										$query = "INSERT INTO scripture(book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)";
										$statement = $db->prepare($query);
										$statement->bindValue(':book', $_POST['book'], PDO::PARAM_STR);
										$statement->bindValue(':chapter', $_POST['chapter'], PDO::PARAM_INT);
										$statement->bindValue(':verse', $_POST['verse'], PDO::PARAM_INT);
										$statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);


										$statement->execute();

										foreach ($db->query('SELECT * FROM scriptures') as $scrips)
										{
											$book = $scrips['book'];
											$chapter = $scrips['chapter'];
											$verse = $scrips['verse'];
											echo "<p>$book $chapter : $verse </p>"
										}
										?>
									</header>

						</div>
					</div>

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
										<li><a href="index.php">Homepage</a></li>
										<li><a href="generic.html">Homework/assignments</a></li>
										<li><a href="#">Other menu (WIP)</a></li>
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>