<?php

namespace App\Controllers;

class BannerController
{
    public static function display(): void
    {
        $fp = fopen('./images/banner.png', 'rb');

        header('Content-Type: image/png');
        header("Content-Length: " . filesize('./images/banner.png'));

        fpassthru($fp);
    }
}