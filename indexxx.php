<?php
include_once 'src/User.php';
include_once 'src/DBConnectConfig.php';

if(isset($_GET['username'])
   && isset($_GET['userPasswd'])
   && isset($_GET['usermail'])){
        $name = $_GET['username'];
        $passw = $_GET['userPasswd'];
        $mail = $_GET['usermail'];

        $user1 = new User();
        $user1->setUsername($name)->setPassword($passw)->setEmail($mail);
        $conn = DBConnectConfig::getDbConnection();
        $user1->saveToDB($conn);
    } //else echo "<h3>Eneter your data</h3>";
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['userid'])){
        $id = $_POST['userid'];
        $conn = DBConnectConfig::getDbConnection();
        $user = User::loadUserByID($id, $conn);
    } else { 
        if(isset($_POST['loadAllUsers'])){
            $conn = DBConnectConfig::getDbConnection();
            $user = User::loadAllUsers($conn);
            echo "dupa";
            $conn->close();
            $conn = null;
        }
    }
}   // end if ($_SERVER['REQUEST_METHOD'] == 'POST')  

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <hr>
        <form action="" method="GET">
            <label>LOGIN: 
                <input type="text" name="username" placeholder="enter username">
            </label>
            <label>PASSWD:
                <input type="password" name="userPasswd" placeholder="enter passwd">
            </label>
            <label>EMAIL:
                <input type="email" name="usermail">
            </label><p>
            <input type="submit" value="submit">
                
        </form>
        
        <hr>
        <h3>Wczytaj dane użytkownika</h3>
        <form action="" method="POST">
            <input type="submit" value="load user by id" size="30">
            <input type="number" name="userid">
            <button type="submit" name="addAll">
        </form>
        <<!--
        <hr>
        <form action='' method="POST">
            <input type='hidden' name="loadAllUsers">
            <input type="submit" value="load all users">
        </form>
        -->>
    </body>
</html>
