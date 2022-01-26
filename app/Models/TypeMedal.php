<?php

namespace App\Models;

use App\Database;

class TypeMedal extends Database {

    function get() {
        $result = mysqli_query($this->connect, "SELECT * FROM type_medal");
        return mysqli_fetch_all($result);
    }

    function count() {
        $result = mysqli_query($this->connect, "SELECT COUNT(1) FROM type_medal");
        return mysqli_fetch_array($result);
    }
}