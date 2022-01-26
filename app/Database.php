<?php

namespace App;

abstract class Database {

    public $connect;

    function __construct()
    {
        $this->connect = mysqli_connect('example.com', 'root', '', 'olympiad');
    }

}

