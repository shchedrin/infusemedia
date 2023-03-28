<?php

require_once(__DIR__.'/App/Autoloader.php');

use App\Controllers\VisitController;
use App\Controllers\BannerController;

App\Autoloader::register();

VisitController::detectVisitor();
BannerController::display();