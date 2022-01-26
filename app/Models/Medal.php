<?php

namespace App\Models;

use App\Database;

class Medal extends Database {

    function get() {
        $result = mysqli_query($this->connect, "SELECT * FROM medal");
        return mysqli_fetch_all($result);
    }
    function getAthleteMedal() {
        $result = mysqli_query($this->connect, "SELECT * FROM athletes_medal");
        return mysqli_fetch_all($result);
    }
    function getWhere() {
        $result = mysqli_query($this->connect, "SELECT * FROM medal WHERE id=(SELECT max(id) FROM medal)");
        return mysqli_fetch_row($result);
    }

    function create($typeMedal, $country, $sport, $athlete) {
        return mysqli_query($this->connect, "INSERT INTO medal(type_id,country_id,sport_id,athlete_id) 
        VALUES ('$typeMedal','$country','$sport','$athlete')");

    }
    function createAthletes($medalId, $athleteID) {
        return mysqli_query($this->connect, "INSERT INTO athletes_medal(athlete_medal_id, athlete_id) VALUES ('$medalId', $athleteID)");
    }
    
    function inner() {
        $result = mysqli_query($this->connect, "SELECT medal_name, country.country_name, sport.sport_name, athlete.athlete_name FROM medal 
        LEFT JOIN type_medal AS tp ON medal.type_id = tp.type_id 
        LEFt JOIN country ON medal.country_id = country.country_id 
        LEFT JOIN sport ON medal.sport_id = sport.sport_id 
        LEFT JOIN athlete ON medal.athlete_id = athlete.athlete_id");
        return mysqli_fetch_all($result); 
    }
    function innerMany() {
        $result = mysqli_query($this->connect, "SELECT id, athlete_name FROM medal                  
        LEFT JOIN athletes_medal AS am ON medal.id = am.athlete_medal_id
        LEFT JOIN athlete ON am.athlete_id = athlete.athlete_id");
        return mysqli_fetch_all ($result);
    }
    function countMedal($sort = NULL) {
        $result = mysqli_query($this->connect, "SELECT country_name,  
        SUM(IF (type_id = 1, 1, 0)) AS gold,
        SUM(IF (type_id = 2, 1, 0)) AS silver,
        SUM(IF (type_id = 3, 1, 0)) AS bronze,
        COUNT(id) AS medal_count     
        FROM medal 
        LEFT JOIN country ON (medal.country_id = country.country_id)
        GROUP BY `medal`.`country_id`
        ORDER BY $sort "); 
        return mysqli_fetch_all($result);        
    }


}


