<?php


class Controller {
	protected $viewData = [];
	protected function model($model, $id = []) {
		if (file_exists('app/models/' . $model . '.php')) {
			require_once 'app/models/' . $model . '.php';
			if ($id) {
				return $model::getWithId($id);
			}
			return new $model;
		}
	}

	protected function view($view, $model = [], $data = []) {
		if (file_exists('app/views/' . $view . '.php')) {
			require_once 'app/views/' . $view . '.php';
		}
	}
}