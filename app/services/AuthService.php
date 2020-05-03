<?php


class AuthService {

	public static function logout() {
		session_destroy();
		session_reset();
		exit(header('Location: /tasbeera'));
	}

	public static function signin($user_data) {
		if (AuthService::validateUserData($user_data)) {
			global $conn;
			$sql = "SELECT * FROM user WHERE email='" . $user_data['email'] . "' AND password='" . md5($user_data['password']) . "'";
			echo $sql;
			$result = $conn->query($sql);
			if (isset($result->num_rows) && $result->num_rows == 1) {
				$user_record = $result->fetch_assoc();
				$_SESSION['user_id'] = $user_record['id'];
				$_SESSION['user_name'] = $user_record['name'];
				$_SESSION['user_email'] = $user_record['email'];
				$_SESSION['cartId'] = $user_record['cartId'];
				$_SESSION['city'] = $user_record['city'];
				exit(header('Location: /tasbeera'));
			}
		}
	}

	public static function createUser($user_data) {
		if (AuthService::validateUserData($user_data, true)) {
			global $conn;

			$cart_id = AuthService::createCart();

			$sql = "INSERT INTO user (id, email, password, name, city, cartId) VALUES (NULL, '" . $user_data["email"] . "', '" . md5($user_data["password"]) . "', '"  . $user_data["name"] . "', '" . $user_data["city"] . "', " . $cart_id . ")";
			$conn->query($sql);

			AuthService::signin($user_data);
		}


	}

	private static function validateUserData($user_data, $is_new = []) {
		if (!(isset($user_data['email']) && isset($user_data['password']))) {
			return false;
		}

		if (AuthService::isEmail($user_data['email']) && AuthService::isPassword($user_data['password'])) {
			return false;
		}

		if ($is_new) {
			if (!(isset($user_data['name']) && isset($user_data['city']))) {
				return false;
			}
		}

		return true;
	}

	private static function isEmail($email) {
		if (preg_match("/^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
			return true;
		}
		return false;
	}

	private static function isPassword($password) {
		if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
			return true;
		}
		return false;
	}

	private static function createCart() {
		global $conn;

		$sql = 'INSERT INTO cart () VALUES()';
		$conn->query($sql);
		return $conn->insert_id;
	}

}