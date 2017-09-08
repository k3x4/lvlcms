<?php

if (!function_exists('bs_active')):

    function bs_active($routeName) {
        if (Request::is($routeName)) {
            return ' class=active';
        } else {
            return '';
        }
    }

endif;