<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];

if (isset($components[3])) {
    if ($components[2] == 'restaurant' && $components[3] == 'all') {
        $current_nav_link = 'all_restaurants';
    } elseif ($components[2] == 'home' || !strlen($components[2])) {
        $current_nav_link = 'best_seller';
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tasbeera</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="/tasbeera/includes/css/main.css">
        <script src="https://kit.fontawesome.com/78dee55a2e.js" crossorigin="anonymous"></script>
        <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>
    </head>
<body>
<div class="container">
    <header>
        <nav class="top-bar">
            <div class="navbar-brand">
                <a href="/tasbeera">
                    <h1>Tasbeera</h1>
                </a>
            </div>
            <div class="viewline"></div>
            <div class="txt">

            </div>
            <div class="nav-links">
				<?php
				if (isset($_SESSION['user_type'])) {
					?>
                    <a class="nav-link" href="/tasbeera/user/logout" >
                        <button>Logout</button>
                    </a>
					<?php
				} else {
					?>
                    <a class="nav-link" href="/tasbeera/user/signin">
                        <button>Login</button>
                    </a>
					<?php
				}
				?>
            </div>
        </nav>
        <nav class="sec-nav">
            <a href="/tasbeera" class="nav-button <?= $current_nav_link == 'best_seller' ? 'active' : '' ?>">
                <i class="far fa-star"></i>
                <p>Best Sellers</p>
            </a>

            <a href="/tasbeera/restaurant/all"
               class="nav-button <?= $current_nav_link == 'all_restaurants' ? 'active' : '' ?>">
                <i class="fas fa-utensils"></i>
                <p>All Restaurants</p>

            </a>

            <a class="nav-button small-btn" href="/tasbeera/cart">
                <i class="fas fa-shopping-cart"></i>
            </a>

        </nav>
    </header>
<?php
require_once 'includes/templates/dialogs/authDialogs.php';
require_once 'includes/templates/dialogs/cartDialog.php';