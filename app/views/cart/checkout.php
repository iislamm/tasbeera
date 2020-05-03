<?php /** @noinspection PhpUndefinedVariableInspection */ ?>
<section id="cart">
	<div class="section-head">
		<h2 class="section-title">Checkout</h2>
		<p class="section-description total-price"></p>
		<p class="section-description">Deliver to: <?= $_SESSION['address'] ?></p>
	</div>
	<div class="items-container">
		<?php
		foreach ($model->items as $item) {
			?>
			<div class="item cart-item">
				<div class="item-image">
					<img src="<?= FileService::getImage('/tasbeera/includes/images/items/' . $item->restaurantId . '/' . $item->id . '.jpg') ?>"
						 alt="<?= $item->title ?>">
				</div>
				<div class="item-description">
					<h3 class="item-title"><?= $item->title ?> x<?= $item->quantity ?></h3>
					<p class="item-price">EGP <?= $item->price * $item->quantity ?></p>
				</div>
			</div>
			<?php
		}
		?>

		<div class="section-footer">
			<a href="/tasbeera/cart/confirm">
				<button class="btn-style">Confirm Order</button>
			</a>
		</div>
	</div>
</section>
