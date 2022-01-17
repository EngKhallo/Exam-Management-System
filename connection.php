<?php

    function connect(){
        $conn = mysqli_connect($servername="localhost", $username= "root", $password = "", $dbname = "examms");
        if(!$conn) die ("connection failed");
    return $conn;
    }
