<?php
	namespace App\Core;

	class DB {
		private static $db;

		public static function init () {
			if (is_null(self::$db)) {
				$option = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING);
				self::$db = new \PDO("mysql:host=127.0.0.1;charset=utf8;dbname=dbname","root","", $option);
			}

			return self::$db;
		}

		public static function query ($sql, $params = null) {
			$res = self::init()->prepare($sql);
			if (!$res->execute($params)) {
				echo $sql;
				print_pre($params);
				print_pre(self::init()->errorInfo());
				exit;
			}
			return $res;
		}

		public static function fetch ($sql, $params = null) {
			return self::query($sql, $params)->fetch();
		}

		public static function fetchAll ($sql, $params = null) {
			return self::query($sql, $params)->fetchAll();
		}

		public static function rowCount ($sql, $params = null) {
			return self::query($sql, $params)->rowCount();
		}

	}