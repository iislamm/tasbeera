<?php
require_once 'app/models/Restaurant.php';


class HomeController extends Controller {

	/**
	 * @param string $name
	 * creates restaurant view or user view
	 */
	public function index($name = '') {
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'restaurant') {
			exit(header('Location: /tasbeera/restaurant'));
		}
		$restaurantVM = $this->model('RestaurantsViewModel');
		$restaurants = Restaurant::getAll();
		$restaurantVM->restaurants = $restaurants;

		global $current_nav_link;
		$current_nav_link = 'best_seller';

		$this->view('home/index', $restaurantVM);
	}
}
