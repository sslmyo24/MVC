<?php
	// session
	session_start();

	// set datetime
	date_default_timezone_set('asia/seoul');

	// path
	define("_DIR", __dir__);
	define("_APP", _DIR."/App");
	define("_PUBLIC", _DIR."/Public");

	// url
	define("HOME", str_replace("/index.php", "$2", $_SERVER['PHP_SELF']));
	define("SRC", HOME."/Public");

	// config
	require_once(_APP."/Config/Loader.php");
	require_once(_APP."/Config/Lib.php");

	// run
	App\Core\Controller::run();