<?php


class CartController extends Controller {

	public function index() {
		if (isset($_SESSION['cartId'])) {
			$cart = $this->model('Cart', $_SESSION['cartId']);

			$this->view('cart/index', $cart);
		}
	}

	public function items() {

	}

	public function checkout() { // DO NOT TOUCH!

	}

}