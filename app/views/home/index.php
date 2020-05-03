<?php /** @noinspection PhpUndefinedVariableInspection */ ?>

<div class="grid page-grid">
    <aside class="col-2">
        <div class="sidebar-box-shadow">
            <ul>
                <li>
                    <a href="#food">Food</a>
                </li>
                <li>
                    <a href="#dessert">Dessert</a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="content col-8">
        <section id="food">
            <div class="section-head">
                <h2 class="section-title">Food</h2>
                <p class="section-description">A great boost for your day ahead!</p>
            </div>
            <div class="grid">
				<?php
                $i = 0;
				foreach ($model->restaurants as $restaurant) {
					if (strtolower($restaurant->main_category) == 'food' && $i++ < 3) {
						?>
                        <div class="card">
                            <div class="card-media">
                                <img src="<?= FileService::getImage("/tasbeera/includes/images/restaurants/" . $restaurant->id . ".jpg") ?>" alt=<?= $restaurant->name ?>>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">
									<?= $restaurant->name ?>
                                </h3>
                                <div class="card-description">
									<?= $restaurant->categories ?>
                                </div>
                                <div class="card-footer">
                                    <a href=<?= "/tasbeera/restaurant/" . $restaurant->id ?>>
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
        </section>
        <section id="dessert">
            <div class="section-head">
                <h2 class="section-title">Desserts</h2>
                <p class="section-description">A great boost for your day ahead!</p>
            </div>
            <div class="grid">
				<?php
				$i = 0;
				foreach ($model->restaurants as $restaurant) {
					if (strtolower($restaurant->main_category) == 'desserts' && $i++ < 3) {
						?>
                        <div class="card">
                            <div class="card-media">
                                <img src=<?= FileService::getImage("/tasbeera/includes/images/restaurants/" . $restaurant->id . ".jpg") ?> alt=<?= $restaurant->name ?>>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">
									<?= $restaurant->name ?>
                                </h3>
                                <div class="card-description">
									<?= $restaurant->categories ?>
                                </div>
                                <div class="card-footer">
                                    <a href=<?= "/tasbeera/restaurant/" . $restaurant->id ?>>
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
        </section>
    </div>
</div>