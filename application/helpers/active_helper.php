<?php

	if(!function_exists('show_active_menu')) {

		function show_active_menu($link) {

			$ci=& get_instance();

			$result = "";

			if($ci->uri->segment(1,0) === $link) {
				$result = 'class="active"';
			}

			if($ci->uri->segment(2,0) === $link && $ci->uri->segment(1,0) === 'user') {
				$result = 'class="active"';
			}

			return $result;
		}
	}
