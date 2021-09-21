<?php
include 'fnwebsite.php';
include 'dbh.php';
include 'fnpost.php';
include 'fncomments.php';
include 'likes.php';
include 'commentst.php';
include 'delet.php';
date_default_timezone_set('Europe/Amsterdam');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
<?php
if (isset($_SESSION["username"])) {
    background($connect);
    loggednavbar($connect);
    sidenavbar();
    echo "<a class='Probleem' href='pbpost.php'>Probleem posten<a>";
    searchpost($connect);
   echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
} else {
  background($connect);
    navbar();
    sidenavbar1();
    echo "<a class='Probleem' href='login.php'>Probleem posten<a>";
    searchpost1($connect);
    echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
}?>
<script>
 CKEDITOR.replace( 'commenst' ); 
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