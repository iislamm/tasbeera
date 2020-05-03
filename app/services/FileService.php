<?php


class FileService {
	private static $DEFAULT_IMAGE_PATH = "/tasbeera/includes/images/default.png";
	public static function getImage($path) {
		$inner_path = str_replace('/tasbeera/', '', $path);
		if (file_exists($inner_path)) {
			return $path;
		}
		return FileService::$DEFAULT_IMAGE_PATH;
	}

}