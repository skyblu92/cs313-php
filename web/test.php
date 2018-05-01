<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<p>This is a test</p>
	<?php
	for ($x = 0; $x <= 10; $x++)
	{
		if ($x % 2 == 0)
			echo "<div class=\"div$x\">Div $x</div>";
		else
			echo "<div class=\"div$x\" style=\"color:red\">Div $x</div>";
	}

	?>
</body>
</html>