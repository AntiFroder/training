<?php

$typeMedal = $_POST['medalsID'];
$country = $_POST['countriesID'];
$sport = $_POST['sportsID'];
$athlete = $_POST['athletesID'];
$databaseMedal->create($typeMedal,$country,$sport,$athlete[0]);
$medal = $databaseMedal->getWhere();
if(count($athlete) > 1) {    
    for($i = 1; $i < count($athlete); $i++) {
        $databaseMedal->createAthletes($medal[0], $athlete[$i]);        
    }    
}


header("Location: /medals");