<?php
include 'fnwebsite.php';
include 'dbh.php';
include 'fnpost.php';
include 'fncomments.php';
date_default_timezone_set('Europe/Amsterdam');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_SESSION['username'])) {
  background($connect); 
  loggednavbar($connect);
  sidenavbar();
  echo '<div class=profile>
  
  
  
  
  
  </div>';








}  
?>    

</body>
</html>