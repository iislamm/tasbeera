<?php

require_once 'app/services/AuthService.php';

class UserController extends Controller {

	/**
	 * creates new user account and saves it to the database
	 * create new user view
	 */
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

	/**
	 * get user's data from the database for authentication
	 * create user view if successfully logged in
	 */
	public function signin() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user_data = [];
			$user_data['email'] = $_POST['email'];
			$user_data['password'] = $_POST['password'];
			AuthService::user_signin($user_data);
		}

		$user = $this->model('User');

		$this->view('user/signin', $user);
	}

	/**
	 * log user out of the system
	 */
	public function logout() {
		AuthService::logout();
	}
}