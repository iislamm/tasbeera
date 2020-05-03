<?php


class FileService {
	private static $DEFAULT_IMAGE_PATH = "/tasbeera/includes/images/default.png";

	/**
	 * @param $path
	 * @return string
	 * gets the image path
	 */
	public static function getImage($path) {
		$inner_path = str_replace('/tasbeera/', '', $path);
		if (file_exists($inner_path)) {
			return $path;
		}
		return FileService::$DEFAULT_IMAGE_PATH;
	}

}