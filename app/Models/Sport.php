<?php

namespace App\Models;

use App\Database;

class Sport extends Database {
    
    function get() {
        $result = mysqli_query($this->connect, "SELECT * FROM sport");
        return mysqli_fetch_all($result);
    }

    function create($name){        
        return mysqli_query($this->connect, "INSERT INTO sport(sport_name) VALUES ('$name')");
    }

    function delete($countryId, $countryBd) {        
        return mysqli_query($this->connect, "DELETE FROM sport WHERE $countryId = '$countryBd'");
    }
    
}