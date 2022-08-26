<?php
	// Cart
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if(isset($_SESSION[$id])){
			// Remove products from cart
			unset($_SESSION["product_".$id]);
		}else{
			$_SESSION["product_".$id] = $total_products[$id];
		}
	}

	// Fetch data from API if already not in DB
	if(count($total_products) == 0){
		$url = 'https://mocki.io/v1/46035b6a-145c-448a-8969-a5274e8dff24';
		$data = file_get_contents($url);
		if($data !== FALSE){
			$data = json_decode($data, true)[0]['products'];
			foreach($data as $d){
				$query = "INSERT INTO products ( s_no, item_id, item_name, type, keywords, best_sellers, test_count, included_test, url, min_price, lab_name, fasting, available_at, popular, category, objectId, status, timestamp ) VALUES ( '{$d['s_no']}', '{$d['itemId']}', '{$d['itemName']}', '{$d['type']}', '{$d['Keyword']}', '{$d['Best_sellers']}', '{$d['testCount']}', '{$d['Included_Tests']}', '{$d['url']}', '{$d['minPrice']}', '{$d['labName']}', '{$d['fasting']}', '{$d['availableAt']}', '{$d['popular']}', '{$d['category']}', '{$d['objectID']}', '{$d['status']}', '{$d['timestamp']}' )";
				$runQuery = mysqli_query($conn, $query);
				if(!$runQuery) die('Error: '.mysqli_error($conn));
			}
			// After getting the data, reload the page
			header("Location: index.php");
			die();
		}
	}
?>