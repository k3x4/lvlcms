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

if (!function_exists('imgPathValidate')):

    function imgPathValidate($imgPath) {

        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $contentType = mime_content_type($imgPath);

        if (!in_array($contentType, $allowedMimeTypes)) {
            return false;
        }
        return true;
    }

endif;

if (!function_exists('imgPath')):
    
    function imgPath($imgPath) {
        return storage_path('app/public/') . basename($imgPath);
    }
    
endif;