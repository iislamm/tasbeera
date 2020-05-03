<?php


class Order extends Model {
	public $id;
	public $userId;
	public $totalCost;
	public $address;
	public $restaurantId;
	public $items;

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
}