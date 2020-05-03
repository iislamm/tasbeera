<?php


class AuthService {

	/**
	 * user logout from the system
	 * delete session data
	 * navigate to the home page
	 */
	public static function logout() {
		session_destroy();
		session_reset();
		exit(header('Location: /tasbeera'));
	}

	/**
	 * @param $user_data
	 * authenticate the user and sign in
	 * get the user data from the database
	 */
	public static function user_signin($user_data) {
		if (AuthService::validateData($user_data)) {
			global $conn;
			$sql = "SELECT * FROM user WHERE email='" . $user_data['email'] . "' AND password='" . md5($user_data['password']) . "'";
			$result = $conn->query($sql);
			if (isset($result->num_rows) && $result->num_rows == 1) {
				$user_record = $result->fetch_assoc();
				$_SESSION['user_id'] = $user_record['id'];
				$_SESSION['user_name'] = $user_record['name'];
				$_SESSION['user_email'] = $user_record['email'];
				$_SESSION['cartId'] = $user_record['cartId'];
				$_SESSION['city'] = $user_record['city'];
				$_SESSION['address'] = $user_record['address'];
				$_SESSION['user_type'] = 'user';
				exit(header('Location: /tasbeera'));
			}
		}
	}

	/**
	 * @param $data
	 * authenticate the restaurant and sign in
	 * get the restaurant data from the database
	 */
	public static function restaurant_signin($data) {
		if (AuthService::validateData($data)) {
			global $conn;
			$sql = "SELECT * FROM restaurant WHERE email='" . $data['email'] . "' AND password='" . md5($data['password']) . "'";
			$result = $conn->query($sql);
			if (isset($result->num_rows) && $result->num_rows == 1) {
				$record = $result->fetch_assoc();
				$_SESSION['restaurant_id'] = $record['id'];
				$_SESSION['restaurant_name'] = $record['name'];
				$_SESSION['restaurant_email'] = $record['email'];
				$_SESSION['user_type'] = 'restaurant';
//				exit(header('Location: /tasbeera/restaurant'));
				echo "reached here";
			}
			echo $conn->error;
		}
	}

	/**
	 * @param $user_data
	 * validate user's data
	 * add new user to the database
	 * user sign in
	 */
	public static function createUser($user_data) {
		if (AuthService::validateData($user_data, 'user', true)) {
			global $conn;

			$cart_id = AuthService::createCart();

			$sql = "INSERT INTO user (id, email, password, name, city, cartId) VALUES (NULL, '" . $user_data["email"] . "', '" . md5($user_data["password"]) . "', '" . $user_data["name"] . "', '" . $user_data["city"] . "', " . $cart_id . ")";
			$conn->query($sql);
			echo $conn->error;
			AuthService::user_signin($user_data);
			echo $conn->error;
		}
	}

	/**
	 * @param $data
	 * validate restaurant's data
	 * add new restaurant to the database
	 * restaurant sign in
	 */
	public static function createRestaurantAccount($data) {
		if (AuthService::validateData($data, 'restaurant', true)) {
			global $conn;

			$sql = "INSERT INTO `restaurant` (`id`, `name`, `email`, `password`, `phone`, `rate`, `delivery_wait`, `delivery_fee`, `categories`, `main_category`) VALUES (NULL, '" . $data['name'] . "', '" . $data['email'] . "', '" . md5($data['password']) . "', '" . $data['phone'] . "', NULL, '" . $data['delivery_wait'] . "', '" . $data['delivery_fee'] . "', '" . $data['categories'] . "', '" . $data['main_category'] . "')";
			$conn->query($sql);

			echo $conn->error;
			AuthService::restaurant_signin($data);
		}
	}


	/**
	 * @param $data
	 * @param string $type
	 * @param array $is_new
	 * @return bool
	 * checks whether the email and password are typed correctly
	 * checks whether the email exists or not
	 * returns false if any error occurred false otherwise
	 */
	private static function validateData($data, $type = 'user', $is_new = []) {
		if (!(isset($data['email']) && isset($data['password']))) {
			return false;
		}

		if (AuthService::isEmail($data['email']) && AuthService::isPassword($data['password'])) {
			return false;
		}

		if ($is_new) {
			if (!(isset($data['name']))) {
				return false;
			}

			if ($type == 'restaurant') {
				if (!(isset($data['phone']) && isset($data['delivery_wait']) && isset($data['delivery_fee'])
					&& isset($data['categories']) && isset($data['main_category']))) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * @param $email
	 * @return bool
	 * validates the email using regex expression
	 */
	private static function isEmail($email) {
		if (preg_match("/^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
			return true;
		}
		return false;
	}

	/**
	 * @param $password
	 * @return bool
	 * validates the password using regex expression
	 */
	private static function isPassword($password) {
		if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
			return true;
		}
		return false;
	}

	/**
	 * @return mixed
	 * creates new cart and saves it to the database
	 */
	private static function createCart() {
		global $conn;

		$sql = 'INSERT INTO cart () VALUES()';
		$conn->query($sql);
		return $conn->insert_id;
	}

}