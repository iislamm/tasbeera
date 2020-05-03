<?php /** @noinspection PhpUndefinedVariableInspection */ ?>
<section id="cart">
    <div class="section-head">
        <h2 class="section-title">Cart</h2>
        <p class="section-description"></p>
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
                    <h3 class="item-title"><?= $item->title ?></h3>
                    <p class="item-price">EGP <?= $item->price ?></p>
                </div>
                <div class="item-actions">
                    <select onchange="handleQuantityChange(this, <?= $item->id ?>)">
                        <option value="1" <?= $item->quantity == 1 ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= $item->quantity == 2 ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= $item->quantity == 3 ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= $item->quantity == 4 ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= $item->quantity == 5 ? 'selected' : '' ?>>5</option>
                    </select>
                    <button class="delete" onclick="removeItem(this, <?= $item->id ?>)">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
            </div>
			<?php
		}
		?>

        <div class="section-footer">
            <a href="/tasbeera/cart/checkout">
                <button class="btn-style">Checkout</button>
            </a>
        </div>
    </div>
</section>
