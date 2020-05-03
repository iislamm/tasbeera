<?php /** @noinspection PhpUndefinedVariableInspection */ ?>
<div class="grid page-grid">
    <aside class="col-2">
        <div class="sidebar-box-shadow">
            <h4>Filter By</h4>
            <ul class="filters">
                <li>
                    <input type="checkbox" class="filter" name="sandwiches"/> Sandwiches
                </li>
                <li>
                    <input type="checkbox" class="filter" name="chinese"/> Chinese
                </li>
                <li>
                    <input type="checkbox" class="filter" name="crepes-and-waffles"/> Crepes and Waffles
                </li>
                <li>
                    <input type="checkbox" class="filter" name="delivery"/> Quick Delivery
                </li>
                <li>
                    <input type="checkbox" class="filter" name="rate"/> High Rate
                </li>
        </div>
        </ul>
    </aside>
    <div class="content col-8">
        <section>
            <div class="section-head">
                <h2 class="section-title">All Restaurents</h2>
            </div>
            <ul class="rich-list">
				<?php
				foreach ($model->restaurants as $restaurant) {
					?>
                    <li class="list-item">
                        <a href="/tasbeera/restaurant/<?= $restaurant->id ?>">
                            <div class="grid grid-6">
                                <div class="image-container">
                                    <img src= "<?= FileService::getImage("/tasbeera/includes/images/restaurants/" . $restaurant->id  . ".jpg")?>"
                                         alt="<?= $restaurant->name ?>"/>
                                </div>
                                <div class="col-4">
                                    <h3 class="title"><?= $restaurant->name ?></h3>
                                    <p class="categories"><?= $restaurant->categories ?></p>
                                    <p class="rate">Rate: <?= $restaurant->rate ?></p>
                                    <p class="delivery"><?= $restaurant->delivery_wait ?>
                                        - <?= $restaurant->delivery_wait + 10 ?> mins. Delivery fee:
                                        EGP <?= $restaurant->delivery_fee ?></p>
                                </div>
                                <div class="actions">
                                    <div>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
					<?php
				}
				?>
            </ul>
        </section>
    </div>
</div>