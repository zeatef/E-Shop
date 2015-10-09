<?php
	
	$cart = " 1 2 3 4 5 6";
	$items = explode(" ", $cart);
	$counter = 0;
	while ( $counter < 7) {
		echo $items[$counter];
		$counter++;
	}
?>
