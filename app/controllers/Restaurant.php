<?php
require_once 'app/services/AuthService.php';
require_once 'app/models/Restaurant.php';
require_once 'app/models/Order.php';

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
				$restaurantVM = $this->model('RestaurantDashboardVM');
				$restaurant = Restaurant::getWithId($_SESSION['restaurant_id']);
				$restaurantVM->restaurant = $restaurant;
				$restaurantVM->rate = $restaurant->rate;
				$restaurantVM->orders_count = Order::getOrdersCount($restaurant->id);
				$this->view('/restaurant/dashboard', $restaurantVM);
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

	public function signin() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			AuthService::restaurant_signin(['email' => $_POST['email'], 'password' => $_POST['password']]);
		}
		$this->view('restaurant/signin');
	}

	public function addItem() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$item = new Item();
			$item->title = $_POST['title'];
			$item->description = $_POST['description'];
			$item->price = $_POST['price'];
			$item->type = $_POST['type'];
			$item->restaurantId = $_SESSION['restaurant_id'];
			exit(header('Location: /tasbeera/restaurant'));
		} else {
			$this->view('restaurant/addItem');
		}
	}
}