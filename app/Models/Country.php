<?php

namespace App\Models;

use App\Database;

class Country extends Database {
    
    function get() {
        $result = mysqli_query($this->connect, "SELECT * FROM country");
        return mysqli_fetch_all($result);
    }
    function first(){
        $result = mysqli_query($this->connect, "SELECT * FROM country");
        return mysqli_fetch_row($result);
    }

    function create($name){        
        return mysqli_query($this->connect, "INSERT INTO country(country_name) VALUES ('$name')");
    }

    function delete($countryId, $countryBd) {        
        return mysqli_query($this->connect, "DELETE FROM country WHERE $countryId = '$countryBd'");
    }
    
}