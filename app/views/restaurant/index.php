<?php /** @noinspection PhpUndefinedVariableInspection */

$groupedItems = [];
$types = [];
foreach ($model->items as $item) {
	if (isset($groupedItems[$item->type])) {
		array_push($groupedItems[$item->type], $item);
	} else {
		$groupedItems[$item->type] = [$item];
	}
}
$types = array_keys($groupedItems);

?>
<div class="grid page-grid">
    <aside class="col-2">
        <div class="sidebar-box-shadow">
            <ul>
				<?php
				foreach ($types as $type) {
					?>
                    <li>
                        <a href=<?= "#" . $type ?>><?= $type ?></a>
                    </li>
					<?php
				}
				?>
            </ul>
        </div>
    </aside>
    <div class="content col-8">
		<?php
		foreach ($types as $type) {
			?>
            <section id=<?= $type ?>>
                <div class="section-head">
                    <h2 class="section-title"><?= $type ?></h2>
                    <!--                    <p class="section-description">have the great taste of life!</p>-->
                </div>
                <div class="grid">
					<?php
					foreach ($groupedItems[$type] as $item) {
						?>
                        <div class="card">
                            <div class="card-media">
                                <img src=<?= FileService::getImage("/tasbeera/includes/images/items/" . $item->restaurantId . "/" . $item->id . '.jpg') ?> alt=<?= $item->title ?>>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">
									<?= $item->title ?>
                                </h3>
                                <div class="card-description">
									<?= $item->description ?>
                                </div>
                                <div class="card-footer">
                                    <div class="price">EGP <?= $item->price ?></div>
                                    <button onclick="addItem(this, <?= $item->id ?>, <?= $item->restaurantId ?>)">add to cart</button>
                                </div>
                            </div>
                        </div>
						<?php
					}
					?>
                </div>
            </section>
			<?php
		}
		?>
    </div>
</div>