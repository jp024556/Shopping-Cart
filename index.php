<?php
	require_once('partials/db.php');
	require_once('partials/getAllProducts.php');
	require_once('partials/misc.php');
	require_once('partials/header.php');

?>


		<h1>Products</h1>
		<a class="link" href="cart.php">Go to Cart &rarr;</a>
		<div class="products">
			<?php foreach($total_products as $product):?>
			<div class="product">
				<div class="item_name">Item Name: <?php echo $product['item_name']; ?></div>
				<div class="item_type">Type: <?php echo $product['type']; ?></div>
				<div class="lab_name">Lab Name: <?php echo $product['lab_name']; ?></div>
				<div class="test_count">Test Count: <?php echo $product['test_count']; ?></div>
				<div class="category">Category: <?php echo $product['category']; ?></div>
				<div class="min_price">Minimum Price: <?php echo $product['min_price']; ?></div>
				<div class="cart_btn">
					<?php if(isset($_SESSION["product_".((int) $product['id'] - 1)])): ?>
					<a class="remove" href="?id=<?php echo ((int) $product['id'] - 1); ?>">Remove From Cart</a>
					<?php else: ?>
					<a href="?id=<?php echo ((int) $product['id'] - 1); ?>">Add to Cart</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

<?php require_once('partials/footer.php'); ?>