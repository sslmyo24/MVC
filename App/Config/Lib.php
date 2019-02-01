<?php
	// alert message
	function alert ($str) {
		echo "<script>alert('$str')</script>";
	}

	// move page
	function move ($str = false) {
		echo "<script>";
		echo $str ? "location.replace('$str')" : "history.back();";
		echo "</script>";
		exit;
	}

	// access
	function access ($bol, $msg, $url = false) {
		if (!$bol) {
			alert($msg);
			move($url);
		}
	}

	// print pre
	function print_pre ($str) {
		echo "<pre>";
		print_r($str);
		echo "</pre>";
	}

	// file upload
	function file_upload ($file) {
		if (is_uploaded_file($file['tmp_name'])) {
			$ext = preg_replace("/^(.*)\.(.*)$/", "$2", $file['name']);
			$tmp_name = time()."_".rand(0, 99999).".{$ext}";
			if (!move_uploaded_file($file['tmp_name'], _PUBLIC."/data/{$tmp_name}")) {
				print_pre($file);
				exit;
			} else {
				return $tmp_name;
			}
		} else {
			return null;
		}
	}
