<?php

require_once 'app/models/Cart.php';
require_once 'app/models/Order.php';

class CartController extends Controller {

	/**
	 * creates cart model and view
	 */
	public function index() {
		if (isset($_SESSION['cartId'])) {
			$cart = $this->model('Cart', $_SESSION['cartId']);

			$this->view('cart/index', $cart);
		}
	}

	/**
	 * creates checkout view
	 */
	public function checkout() {
		$cart = $this->model('Cart', $_SESSION['cartId']);
		$this->view('cart/checkout', $cart);
	}

	/**
	 * user checkout, add a new order to the database and create order view
	 */
	public function confirm() {
		$cart = Cart::getWithId($_SESSION['cartId']);
		if ($cart->items) {
			$order = new Order;
			$order->userId = $_SESSION['user_id'];
			$order->totalCost = $cart->totalCost;
			$order->address = $_SESSION['address'];
			$order->restaurantId = $cart->items[0]->restaurantId;
			$order->items = $cart->items;
			Order::addToDB($order);
			$cart->clearCart();
			$this->view('cart/confirm');
		}
	}

}