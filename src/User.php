<?php
require_once 'src/DBConnectConfig.php';

class User{
    private $id;
    private $username;
    private $email;
    private $hashedPassword;
    
    public function __construct() {
        $this->id = -1;
        $this->username = "";
        $this->email = "";
        $this->hashedPassword = "";
    } // constructors end
    
    public function getId(){
        return $this->id;
    }
    
    private function setId($id){
        if(is_numeric($id) && $id > 0){
            $this->id = $id;
        }
        return $this;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username){
        if (is_string($username)
            && strlen(trim($username)) > 0){
                $this->username = $username;
                return $this;
            } else {
                echo "wprowadzono niewłaściwą nazwę użytkownika<br>";
                return;                                     // czy to dobry sposób na zakończenie w razie niepowodzenia?
            } // if username went wrong
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
     if (is_string($email) 
         && strpos($email, '@')
         && strlen(trim($email)) > 0){
             $this->email = $email;
             return $this;
         } else {
             echo "wprowadzono niewłaściwy adres email użytkownika.<br>";
             return;                                     // czy to dobry sposób na zakończenie w razie niepowodzenia?
         } // if username went wrong
    } // setEmail function end 
    
    public function setPassword($usersPassword){
        $newHashedPassword = password_hash($usersPassword, PASSWORD_BCRYPT);
        $this->hashedPassword = $newHashedPassword;
        return $this;
    } // setPassword end   
    
    public function saveToDB(mysqli $conn){
        if($this->id == -1) {
            $statement = $conn->prepare("INSERT INTO `users` "
                . "(username, hashedPassword, email) "
                . "VALUES (?, ?, ?)");
            
            $statement->bind_param('sss', $this->username, $this->hashedPassword, $this->email);
            
            if ($statement->execute()){
                $this->id = $conn->insert_id;
                print_r($this);
                return true;
            } // end of if ($statement->execute())
        } // end of if($this->id == -1) 
    } // saveToDB function end
    
    static public function loadUserByID($id, mysqli $conn){
        $sql = "SELECT * FROM `users` WHERE `id` = $id";
        $result = $conn->query($sql);
        
        if($result){
            
            if($result->num_rows == 1){
                $row = $result->fetch_assoc(); 
                
                $id = $row['id'];
                $name = $row['username'];
                $hshPasswda = $row['hashedPassword'];
                $email = $row['email'];
                
                $user = new User();
                $user->setId($id)
                     ->setUsername($name)
                     ->setEmail($email)
                     ->setPassword($hshPasswda);
                
                print_r($user);
                return $user;
            } else {
                echo "Nie ma użytkownika o podanym id: $id";
                print_r($result);
                return null;
            }

        } else {
            echo "Zapytanie nie zostało poprawnie przeprowadzone.<br>"
            . " Wystąpił błąd: ".$conn->error."<br>";
        } // koniec if / else ($result)

    } // loadUserByID function end
    
} // class user end