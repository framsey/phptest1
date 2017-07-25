<?php 
	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bob's auto parts-order results</title>
</head>
<body>
	<h1>bob's auto parts</h1>
	<h2>order results</h2>
	<?php 
		echo "<p>your order is as follows:</p>";
		echo $tireqty.'tires<br />';
		echo $oilqty.'bottles of oil<br />';
		echo $sparkqty.'spark plugs<br />';
	 ?>
</body>
</html>