<?php
require_once 'app/models/Restaurant.php';
require_once 'app/services/AuthService.php';

class RestaurantController extends Controller {

	/**
	 * @param array $id
	 * get a restaurant from the database with the parameter id
	 * creates restaurant view for the user to show a restaurant
	 * OR creates dashboard view for a restaurant
	 */
	public function index($id = []) {
		if (isset($_SESSION['user_type'])) {
			if ($_SESSION['user_type'] == 'user') {
				if ($id) {
					$restaurant = $this->model('Restaurant', $id);
					$this->view('restaurant/index', $restaurant);
				}
			} elseif ($_SESSION['user_type'] == 'restaurant') {
				$restaurant = $this->model('Restaurant', $_SESSION['restaurant_id']);
				$this->view('/restaurant/dashboard');
			}
		}
	}

	/**
	 * get all restaurants from the database
	 * create restaurants view for the user
	 */
	public function all() { // TODO Add user condition
		$restaurantVM = $this->model('RestaurantsViewModel');
		$restaurants = Restaurant::getAll();
		$restaurantVM->restaurants = $restaurants;

		global $current_nav_link;
		$current_nav_link = 'all_restaurants';

		$this->view('restaurant/all', $restaurantVM);
	}

	/**
	 * create new restaurant account and saves it to the database
	 */
	public function create() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
			$data = [];
			$data['name'] = $_POST['name'];
			$data['email'] = $_POST['email'];
			$data['password'] = $_POST['password'];
			$data['phone'] = $_POST['phone'];
			$data['delivery_wait'] = $_POST['delivery_wait'];
			$data['delivery_fee'] = $_POST['delivery_fee'];
			$data['categories'] = $_POST['categories'];
			$data['main_category'] = $_POST['main_category'];
			AuthService::createRestaurantAccount($data);
		}
	}

	/**
	 * create restaurant view
	 */
	public function register() {
		$this->view('restaurant/register');
	}
}