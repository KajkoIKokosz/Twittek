<?php


echo 'dupa';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = $_POST['login'];
    $email = $_POST['email'];
    
    echo $login.$email;
}

?>