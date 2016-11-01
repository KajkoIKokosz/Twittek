<?php
session_start();
include_once './DBConnectConfig.php';

// obsługa zaproszenia do znajomych;
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset($_POST['chooseFriend']) ) {
        $conn = DBConnectConfig::getDbConnection();
        $searchedId = $_POST['chooseFriend'];
        $sql = "SELECT * FROM `friendships` WHERE user_id = {$_SESSION['id']} AND `friend_ID` = $searchedId"; 
        $result = $conn->query($sql);
        
        if( $result->num_rows > 0 ) {
            $_SESSION['report'] = "Jesteście już przyjaciółmi.";
            header('Location: logedIn.php');
        } else {
            $sql1 = "INSERT INTO `friendships` (user_id, friend_id) values ({$_SESSION['id']}, {$_POST['chooseFriend']})";
            $sql2 = "INSERT INTO `friendships` (user_id, friend_id) values ({$_POST['chooseFriend']}, {$_SESSION['id']})";
            $result1 = $conn->query($sql1);
            $result2 = $conn->query($sql2);
            if( $result1 && $result2) {
                $_SESSION['report'] = "Zostaliście przyjaciółmi.";
                header('Location: logedIn.php');
            }
        }
       
    }
}

?>

