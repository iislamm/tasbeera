<?php
require_once 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	print_r($_SESSION);
	$sql = "SELECT * FROM cart WHERE id = " . $_SESSION['cartId'];
	$query_result = $conn->query($sql);
	$cart = $row = $query_result->fetch_assoc();

	$sql = "SELECT * FROM cartitems WHERE cartId=" . $cart['id'];
	$query_result = $conn->query($sql);

	$items = [];
	if ($query_result->num_rows > 0) {
		while ($row = $query_result->fetch_assoc()) {
			$sql = 'SELECT * FROM item WHERE id=' . $row['itemId'];
			$temp_result = $conn->query($sql);
			if ($temp_result->num_rows) {
				$item = $temp_result->fetch_assoc();
				array_push($items, $item);
			}
		}
	}

	$cart['items'] = $items;

	header('Content-Type: application/json');
	echo json_encode($cart);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$data = json_decode(file_get_contents('php://input'), true);
	$item_id = $data['id'];
	$sql = 'INSERT INTO cartitems (itemId, cartId) VALUES (' . $item_id . ', ' . $_SESSION['cartId'] . ')';
	$result = $conn->query($sql);
	echo $result;
	if ($conn->error) {
		die($conn->error);
	}
	echo $result;
	echo $_SESSION['cartId'];
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	$data = json_decode(file_get_contents('php://input'), true);
	$item_id = $_GET['id'];
	$quantity = $data['quantity'];
	$sql = 'UPDATE cartitems SET quantity=' . $quantity . ' WHERE itemId=' . $item_id . ' AND cartId = ' . $_SESSION['cartId'];
	$result = $conn->query($sql);
	echo $result;
	if ($conn->error) {
		die($conn->error);
	}
	echo $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	$item_id = $_GET['id'];
	$sql = 'DELETE FROM cartitems WHERE itemId=' . $item_id . ' AND cartId=' . $_SESSION['cartId'];
	$result = $conn->query($sql);
	if ($conn->error) {
		die($conn->error);
	}
	echo $result;
}