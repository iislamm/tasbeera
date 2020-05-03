<?php

require_once 'app/services/AuthService.php';

class UserController extends Controller {
	public function create() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user_data = [];
			$user_data['name'] = $_POST['name'];
			$user_data['email'] = $_POST['email'];
			$user_data['password'] = $_POST['password'];
			$user_data['city'] = $_POST['city'];

			AuthService::createUser($user_data);
			global $conn;
			echo $conn->error;
		}

		$user = $this->model('User');

		$this->view('user/create', $user);
	}

	public function signin() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user_data = [];
			$user_data['email'] = $_POST['email'];
			$user_data['password'] = $_POST['password'];
			AuthService::signin($user_data);
		}

		$user = $this->model('User');

		$this->view('user/signin', $user);
	}

	public function logout() {
		AuthService::logout();
	}
}