<?php
include 'fnwebsite.php';
include 'fnpost.php';
include 'dbh.php';
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
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>

<?php



if (isset($_SESSION["username"])) {
    background($connect);
    loggednavbar($connect);
    sidenavbar();
    echo "<a class='Probleem' href='pbpost.php'>Probleem posten<a>";
    } else {
        navbar();
        echo "<a class='Probleem' href='pbpost.php'>Probleem posten<a>";
    }
    



$cid = $_POST["cid"];
$uid = $_POST["uid"];
$date = $_POST["date"];
$message = $_POST["message"];





echo '<center><div class="wrapper">
			<div class="title">
			 Edit</div>
	  <form action="'.editcomments($connect).'" method="POST">
     <div class="ewa">
     <input type="hidden" name="cid" value="' . $cid . '">
     <input type="hidden" name="uid" value="' . $uid . '">
     <input type="hidden" name="date" value="' . $date . '">
     <textarea id="Code" name=message>' . $message . '</textarea required>
     </div>
	  <div class="field">
				<br><input type="submit" name="commentssubmit" value="Edit">
			  </div>
	  </form>
	  </div></center>';



?>


<script>
    CKEDITOR.replace( 'message' );
</script>


</body>
</html>