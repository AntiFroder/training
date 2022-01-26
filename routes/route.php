<?php

$route = $_SERVER['REQUEST_URI'];
$template = 'resource/views/';

use App\Models\Athlete;
use App\Models\Country;
use App\Models\Sport;
use App\Models\TypeMedal;
use App\Models\Medal;

$databaseAthlete = new Athlete;
$databaseCountry = new Country;
$databaseSport = new Sport;
$databaseTypeMedal = new TypeMedal;
$databaseMedal = new Medal;
$route = explode('?', $route)[0];
if ($route == '/') {
    include $template . "index.php";
}
elseif($route == '/statistic') {
    include $template . "statistic.php";
} 
if ($route == '/athletes') {
    include $template . "athlete/athletes.php";
} 
elseif ($route == '/countries') {
    include $template . "country/countries.php";
}
elseif ($route == '/sports') {
    include $template . "sport/sports.php";
}
elseif ($route == '/medals') {
    include $template . "medal/medals.php";
}
elseif ($route == '/createMedal') {
    include $template . "medal/createMedal.php";
}