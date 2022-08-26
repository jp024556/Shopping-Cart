<?php
	session_start();
	
	// Cart
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		if($action == 'clear'){
			// clear cart
			session_destroy();
			header('Location: index.php');
			die();
		}
	}

	require_once('partials/header.php');

?>

		<h1>In Your Cart</h1>
		<a class="link" href="index.php">&larr; Back to Products</a>
		<div class="cart_btn">
			<a class="remove" href="?action=clear">Clear Your Cart</a>
		</div>
		<div class="products">
			<?php foreach($_SESSION as $product): ?>
			<div class="product">
				<div class="item_name">Item Name: <?php echo $product['item_name']; ?></div>
				<div class="item_type">Type: <?php echo $product['type']; ?></div>
				<div class="lab_name">Lab Name: <?php echo $product['lab_name']; ?></div>
				<div class="test_count">Test Count: <?php echo $product['test_count']; ?></div>
				<div class="category">Category: <?php echo $product['category']; ?></div>
				<div class="min_price">Minimum Price: <?php echo $product['min_price']; ?></div>
			</div>
			<?php endforeach; ?>
		</div>

<?php require_once('partials/footer.php'); ?>