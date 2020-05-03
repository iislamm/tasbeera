<?php
require_once 'app/models/Restaurant.php';


class HomeController extends Controller {

	public function index($name = '') {
		$restaurantVM = $this->model('RestaurantsViewModel');
		$restaurants = Restaurant::getAll();
		$restaurantVM->restaurants = $restaurants;

		global $current_nav_link;
		$current_nav_link = 'best_seller';

		$this->view('home/index', $restaurantVM);
	}
}
