<?php


class Order extends Model {
	public $id;
	public $userId;
	public $totalCost;
	public $address;
	public $restaurantId;
	public $items;

	/**
	 * @param $order
	 * add order data to the database
	 */
	public static function addToDB($order) {
		global $conn;
		$sql = "INSERT INTO orderr (userId, totalCost, address, restaurantId) VALUES (" . $order->userId . ", " . $order->totalCost . ", '" . $order->address . "', " . $order->restaurantId . ")";
		$conn->query($sql);

		$order_id = $conn->insert_id;
		foreach ($order->items as $item) {
			$sql = "INSERT INTO orderitems (itemId, orderId) VALUES ('" . $item->id . "', '" . $order_id . "')";
			$conn->query($sql);
		}
	}

	public static function getOrdersCount($restaurant_id) {
		global $conn;
		$sql = "SELECT * FROM orderr WHERE restaurantId=" . $restaurant_id;
		$result = $conn->query($sql);
		return $result->num_rows;
	}
}