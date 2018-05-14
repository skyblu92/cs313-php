<?php
session_start();

if(!isset($_SESSION["itemName"]))
$_SESSION["itemName"]=array();


//$_SESSION["itemPrice"]=array();

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>PHP SHOPPING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">


							<!-- Content -->
								<section>
									<header class="main">
										<h1>Shopping Cart Test</h1>
										<p> Your shopping cart:</p>
										<?php 
										foreach($_SESSION["itemName"] as $key=>$value)
											{
										  	echo 'Item: ' . $value . '<br/>';
											}
										?>
									</header>

									<!-- Content -->
										<h2 id="content">Sample Content</h2>
										<p>
											Shopping cart Testing

										</p>
							<div style="display:inline-block; padding: 5px;">
						    <h2>Item1</h2>
						        <form action="add.php" method="post">
						            <input type="hidden" name="itemName" value="item1">
						            <input type="hidden" name="itemPrice" value="20.00">
						            <input type="submit">
						        </form>
						    </div>
							<div style="display:inline-block; padding: 5px;">
						    <h2>Item2</h2>
						        <form action="add.php" method="post">
						            <input type="hidden" name="itemName" value="item2">
						            <input type="hidden" name="itemPrice" value="25.00">
						            <input type="submit">
						        </form>
						    </div>
							<div style="display:inline-block; padding: 5px;">
						    <h2>Item3</h2>
						        <form action="add.php" method="post">
						            <input type="hidden" name="itemName" value="item3">
						            <input type="hidden" name="itemPrice" value="5.00">
						            <input type="submit">
						        </form>
						    </div>
							<div style="display:inline-block; padding: 5px;">
						    <h2>Item4</h2>
						        <form action="add.php" method="post">
						            <input type="hidden" name="itemName" value="item4">
						            <input type="hidden" name="itemPrice" value="1.25">

						            <input type="submit">
						        </form>
						    </div>

						        
								</section>

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