<?php /** @noinspection PhpUndefinedVariableInspection */


class Model {

	/**
	 * @param $id
	 * @return mixed
	 * returns object with specific id
	 */
	public static function getWithId($id) {
		global $conn;
		$class_name = get_called_class();
		$sql = 'SELECT * FROM ' . $class_name . ' WHERE id=' . $id;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return new $class_name($row);
		}
	}

	/**
	 * @return array
	 * returns all objects
	 */
	public static function getAll() {
		global $conn;
		$class_name = get_called_class();
		$sql = 'SELECT * FROM ' . $class_name;
		$result = $conn->query($sql);
		$rows = [];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$row = new $class_name($row);
				array_push($rows, $row);
			}
		}
		return $rows;
	}
}