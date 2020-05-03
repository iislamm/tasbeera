<?php
require_once 'app/models/Restaurant.php';

class RestaurantController extends Controller {
	public function index($id = []) {
		if ($id) {
			$restaurant = $this->model('Restaurant', $id);
			$this->view('restaurant/index', $restaurant);
		}
	}

	public function all() {
		$restaurantVM = $this->model('RestaurantsViewModel');
		$restaurants = Restaurant::getAll();
		$restaurantVM->restaurants = $restaurants;

		global $current_nav_link;
		$current_nav_link = 'all_restaurants';

		$this->view('restaurant/all', $restaurantVM);
	}
}