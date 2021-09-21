<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <?php
include 'fnwebsite.php';;
include 'dbh.php';
include 'fnpost.php';
include 'fncomments.php';
    session_start();
    ?>
    <?php
if (isset($_SESSION["username"])) {
    postlogged($connect);    
    commitpost($connect);
    echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
} else {
    navbar();
    echo "<center><h1><a href='login.php'>Je moet ingelogd zijn als je probleem wilt posten</a></h1></center>";
    echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
}
?>
<script>
function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
}
</script>
<script>
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
