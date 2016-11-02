<?php
    session_start();
    include_once './DBConnectConfig.php';
    
    if( !isset($_SESSION['id']) ) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Twit yourself</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/styleShit.css" rel="stylesheet" type="text/css"/>
        <script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        
        
    </head>
    <body> 
        <div id='container'>
            <div id='logedInH'>
                <div style='float: left; width: 800px;'>
                    <?php 
                        echo "T-witaj ".$_SESSION['username']; 
                    ?>
                </div>
                <div style='float: left;'>
                    <form action="logout.php">
                        <button name='logout'class='myButton'>Wyloguj</button>
                    </form>
                </div>
                <div style='clear: both;'></div>
                
            </div>
            <div id='left'>
                <h3>Znajdź znajomych:</h3>
                <!-- formularz zaproszeń -->
                <form method='POST' action='invitationHandling.php'>
                    <?php
                        $conn = DBConnectConfig::getDbConnection();
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        if ( $result->num_rows > 0 ) {
                            echo "<select name='chooseFriend'>";
                            foreach ($result as $res) {
                                if ( $res['id'] != $_SESSION['id'] ) {
                                    echo  "<option value={$res['id']}>{$res['username']}</option>";
                                }
                            }
                            echo "</select>";
                        }
                        $conn->close();
                        $conn = null;
                    ?>
                    <p>
                    <input type='submit' value='Wyślij zaproszeie'>
                </form>
                <div id='report'> <!-- zmienione z id='message -->
                    <?php
                        if( isset($_SESSION['report']) ) {
                            echo $_SESSION['report'];
                            unset($_SESSION['report']);
                        }
                    ?>
                </div>
                <div id='yourFriends'>
                    <hr>
                    <h3>Twoi znajomi:</h3>
                    <?php
                        // formularz wiadomości do konkretnego użytkownika
                        $conn = DBConnectConfig::getDbConnection();
                        $sql = "SELECT u.id, u.username, u.email FROM users u join friendships f ON u.id = f.friend_id WHERE f.user_id = {$_SESSION['id']}";
                        $result = $conn->query($sql);
                        if ( $result->num_rows > 0 ) {
                            echo "<form method='POST' action='yourFriendsHandling.php'>"
                            . "<select name='chooseFriend'>";
                            foreach ($result as $row) {
                                echo  "<option value={$row['id']}>{$row['username']}</option>";
                            }
                            echo "</select>";
                            echo "<button name='sendMessage'>Wyślij wiadomość</button></form>";
                        } else {
                            echo "Nie masz jeszcze znajomych";
                        }
                        $conn->close();
                        $conn = null;
                    ?>
                </div>
            </div>
            <div id='center'>
                <div id='zaTwituj'>
                    <form action='postHandling.php' method='POST'>
                        <label><h3>Twitnij se:<h3>
                            <textarea name="twitYourself" id="twitYourself" class='textArea' placeholder="Tu można twitować i robić różne inne rzeczy"></textarea>
                        </label>
                        <br>
                        <input type='submit' id="twitBtn" value='Twitnij se' class='myButton'>
                        <script>
                            $(document).ready(function() {
                                $('#twitBtn').on('click', function() {
                                    if( $.trim( $('#twitYourself').val() ).length == 0 ) {
                                        event.preventDefault();
                                    }
                                })
                            })
                        </script>
                    </form>
                </div>
                <!-- wyświetlanie twitów -->
                <div id='Twity'>
                    <?php
                        $conn = DBConnectConfig::getDbConnection();
                        $sql = "SELECT * FROM `twits` ORDER BY `twit_date` DESC";
                        $result = $conn->query($sql);
                        if( $result->num_rows > 0 ) {
                            foreach( $result as $row ) {
                                echo "<hr>
                                <div class='printedtwit'>{$row['twit']}
                                </div>";
                            }
                        }
                    ?>
                </div>
            </div> 
            <div id='right'>
                
            </div> 
            <div id='foohter'>
                
            </div> 
        </div>
      
    </body>
</html>
