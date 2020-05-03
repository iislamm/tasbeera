<?php

require_once 'app/models/Item.php';

class Cart extends Model {
	public $id;
	public $totalCost;
	public $items;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->totalCost = $data['totalCost'];
		$this->getItemsFromDB();
	}

	/**
	 * get cart's items data from the database
	 */
	private function getItemsFromDB() {
		global $conn;
		$sql = 'SELECT * FROM cartitems WHERE cartId=' . $this->id;
		$result = $conn->query($sql);
		$rows = [];
		if ($result->num_rows > 0) {
			while($cartitem_row = $result->fetch_assoc()) {
				$sql = 'SELECT * FROM item WHERE id=' . $cartitem_row['itemId'];
				$result1 = $conn->query($sql);
				echo $conn->error;
				if ($result1->num_rows > 0) {
					$row = $result1->fetch_assoc();
					$row['quantity'] = $cartitem_row['quantity'];
					$row = new Item($row);
					array_push($rows, $row);
				}
			}
		}
		$this->items = $rows;
	}

	/**
	 * remove all items from the cart in the database
	 */
	public function clearCart() {
		global $conn;
		$sql = "DELETE FROM cartitems WHERE cartId = " . $this->id;
		$conn->query($sql);
		$this->items = [];
	}
}