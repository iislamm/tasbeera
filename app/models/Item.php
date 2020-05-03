<?php


class Item {
	public $id;
	public $title;
	public $description;
	public $price;
	public $type;
	public $restaurantId;
	public $quantity;

	public function __construct($data = []) {
		if ($data) {
			$this->id = $data['id'];
			$this->title = $data['title'];
			$this->description = $data['description'];
			$this->price = $data['price'];
			$this->type = $data['type'];
			$this->restaurantId = $data['restaurantId'];
			$this->quantity = isset($data['quantity']) ? $data['quantity'] : [];
		}
	}

	public static function addItem($item) {
		global $conn;
		$sql = "INSERT INTO `item` (`id`, `title`, `description`, `price`, `type`, `restaurantId`) VALUES (NULL, '" . $item->title . "', '" . $item->description . "', '" . $item->price . "', '" . $item->type . "', '" . $item->restaurantId . "')";
		$conn->query($sql);
	}
}