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

?>