<?php

namespace App\Models;

use App\Database;

class Athlete extends Database {
    
    function get() {
        $result = mysqli_query($this->connect, "SELECT * FROM athlete");
        return mysqli_fetch_all($result);
    }

    function create($name){        
        return mysqli_query($this->connect, "INSERT INTO athlete(athlete_name) VALUES ('$name')");
    }

    function delete($athleteId, $athleteBd) {        
        return mysqli_query($this->connect, "DELETE FROM athlete WHERE $athleteId = '$athleteBd'");
    }
}