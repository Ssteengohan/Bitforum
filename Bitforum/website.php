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
    <title>Bitforum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="logo_small.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

<?php

if (isset($_SESSION['username'])) {
  background($connect); 
    loggednavbar($connect);
    sidenavbar();
    opties($connect);
    search($connect);
    echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
} else {
  background($connect); 
    navbar();
    sidenavbar1();
    opthies($connect);
    search($connect);
    echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
 } 

 ?>
<script>
  
function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
}
</script>
<script>
  function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}

var mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>


</body>
</html>
