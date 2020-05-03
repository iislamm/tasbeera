<?php

require_once 'app/models/Item.php';

class Restaurant extends Model {
	public $id;
	public $name;
	public $email;
	public $phone;
	public $rate;
	public $delivery_wait;
	public $delivery_fee;
	public $categories;
	public $main_category;
	public $items;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->phone = $data['phone'];
		$this->rate = $data['rate'];
		$this->delivery_wait = $data['delivery_wait'];
		$this->delivery_fee = $data['delivery_fee'];
		$this->categories = $data['categories'];
		$this->main_category = $data['main_category'];

		$this->getItemsFromDB();
	}

	/**
	 * get restaurant data fro the database
	 */
	private function getItemsFromDB() {
		global $conn;

		$sql = 'SELECT * FROM item WHERE restaurantId=' . $this->id;
		$result = $conn->query($sql);
		$rows = [];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$row = new Item($row);
				array_push($rows, $row);
			}
		}
		$this->items = $rows;
	}
}
