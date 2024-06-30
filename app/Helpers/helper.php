<?php

function set_active($uri) {
	if (is_array($uri)) {
		foreach ($uri as $u) {
			if (Route::is($u)) {
				return 'active';
			}
		}
	} else {
		if (Route::is($uri)) {
			return 'active';
		}
	}
}

if (!function_exists('valid_date_tanggal')) {
	function valid_date_tanggal($tgl_indo) {
		$t = explode('-', $tgl_indo);
		return $t[2] . '-' . $t[1] . '-' . $t[0];
	}
}

?>
