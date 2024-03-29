<?php /** @noinspection PhpUndefinedVariableInspection */


class User extends Model {
	public $name;
	public $id;
	public $email;
	public $cart;
	public $cartId;
	public $city;
	public $address;

	public function __construct($data = []) {
		if ($data) {
			$this->name = $data['name'];
			$this->id = $data['id'];
			$this->email = $data['email'];
			$this->cartId = $data['cartId'];
			$this->city = $data['city'];
			$this->address = $data['address'];
			$this->setCartFromDB();
		}
	}

	/**
	 * give the user an empty cart
	 */
	private function setCartFromDB() {
		global $conn;
		$sql = 'SELECT * FROM cart WHERE id=' . $this->cartId;
		$result = $conn->query($sql);
//		$this->cart = $result->fetch_assoc();
	}

}