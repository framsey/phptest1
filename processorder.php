<?php 
	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$address = $_POST['address'];
	$DOCUMENT_ROOT = $_SEVER['DOCUMENT_ROOT'];
	$date = date('H:i, JS F Y');
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
		echo "<p>Order processed at ".date('H:i, JS F Y')."</P>";
		echo "<p>your order is as follows:</p>";
		$totalqty =0;
		$tatalqty = $tireqty + $oilqty +$sparkqty;
		echo "Items ordered:".$totalqty."<br />";
		if ($totalqty ==0) {
			echo "you did not order anything on the previous page!<br />";
		} else {
			if ($tireqty>0) {
				echo $tireqty.'tires<br />';
			}
			if ($oilqty>0) {
				echo $oilqty.'bottles of oil<br />';
			}
			if ($sparkqty) {
				echo $sparkqty.'spark plugs<br />';
			}
		}

		$totalamount =0.0;

		define('TIREPRICE', 100);
		define('OILPRICE', 10);
		define('SPARKPRICE', 4);

		$totalamount =$tireqty*TIREPRICE+$oilqty*OILPRICE+$sparkqty*SPARKPRICE;
		$totalamount = number_format($totalamount,2,'.','');

		echo "<p>Total of order is $".$totalamount."</p>";
		echo "<p>Address to ship to is".$address."</p>";

		$outputstring =$date."\t".$tireqty."tires \t".$oilqty."oil\t".$sparkqty."spark plugs\t\$".$totalamount."\t".$address."\n";
		@ $fp =fopen("$DOCUMENT_ROOT/../orders/orders.txt", 'ab');

		flock($fp, LOCK_EX);

		if (!$fp) {
			echo "<p><strong>your order could not be processed at this time.please try again later.</strong></p></body></html>";
			exit;
		}

		fwrite($fp, $outputstring,strlen($outputstring));
		flock($fp, LOCK_UN);
		fclose($fp);

		echo "<p>order written.</p>";
		
	 ?>
</body>
</html>