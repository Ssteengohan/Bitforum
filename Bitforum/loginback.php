<?php
include 'login.php';

if(isset($_SERVER['HTTP_REFERER'])) {
    function login($connect) {
        if (isset($_POST['username'])) {
            $query = "SELECT * FROM gebruikers WHERE username = :username AND wachtwoord = :wachtwoord";
            $statement = $connect->prepare($query);
            $statement->bindParam(':username', $_POST['username']);
            $statement->bindParam(':wachtwoord', $_POST['wachtwoord']);
            $statement->execute(
            );
            $count = $statement->rowCount();
           if ($count > 0) { 
               if (isset($_POST['remember'])) {
                   setcookie('username',$_POST['username'],time()+30);
                   setcookie('wachtwoord',$_POST['wachtwoord'],time()+30);
               } else {
                   setcookie('username',$_POST['username'],30);
                   setcookie('wachtwoord',$_POST['wachtwoord'],30);
               }
                           $_SESSION["username"] = $_POST["username"];		
           } else { 
               $message = '<labe>Gebruikers/wachtwoord onjuist</label>';
           }
   }
    }

login($connect);
} 


?>