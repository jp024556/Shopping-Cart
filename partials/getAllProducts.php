<?php
	// Get all products from db
	$getQuery = "SELECT id, item_name, type, lab_name, test_count, min_price, category FROM products";
	$runGetQuery = mysqli_query($conn, $getQuery);
	$total_products = [];
	while($row = mysqli_fetch_assoc($runGetQuery)){
		$total_products[] = $row;
	}
?>