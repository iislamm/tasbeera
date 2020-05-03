<?php


class CartController extends Controller {

	public function index() {
		$cart = $this->model('Cart', 1);

		$this->view('cart/index', $cart);
	}

	public function items() {

	}

	public function checkout() { // DO NOT TOUCH!

	}

}