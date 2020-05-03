<?php


class Controller {
	protected $viewData = [];

	/**
	 * @param $model
	 * @param array $id
	 * @return mixed
	 * create a new model and return it
	 */
	protected function model($model, $id = []) {
		if (file_exists('app/models/' . $model . '.php')) {
			require_once 'app/models/' . $model . '.php';
			if ($id) {
				return $model::getWithId($id);
			}
			return new $model;
		}
	}

	/**
	 * @param $view
	 * @param array $model
	 * @param array $data
	 * create a new view and return it
	 */
	protected function view($view, $model = [], $data = []) {
		if (file_exists('app/views/' . $view . '.php')) {
			require_once 'app/views/' . $view . '.php';
		}
	}
}