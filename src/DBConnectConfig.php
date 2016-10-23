<?php

class DBConnectConfig{
    static function getDbConnection(){
        $serverName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'twit';
        
        $conn = new mysqli($serverName, $userName, $password, $dbName);
        
        if($conn->errno > 0) {
            die("Nie udało się ustanowić połączenia: ".$conn->error."<br>");
        } else {
            echo "Połączenie ustanowione.<br>";
            return $conn;
        }
    }
} // class end