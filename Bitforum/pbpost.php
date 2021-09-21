<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
  background($connect);
    postlogged($connect); 
    sidenavbar();  
    if (isset($_POST['post'])) {
        $title = $_POST['Titel'];
        $Taal = $_POST['Taal'];
        $Keuze = "";
        foreach($Taal as $keuze1) {
            $Keuze.=  $keuze1."/";
        } 
        $date = $_POST['date'];
        $Code = $_POST['Code'];
        $Vraag = $_POST['Vraag'];
        $User = $_POST['User'];
    
        
         $query = "INSERT INTO `post` (`Titel`, `Taal`, `Code`, `Vraag`, `date`, `User`)
         VALUES (:Titel,:Taal,:Code,:Vraag,:date ,:User)" ;
         $query_run = $connect->prepare($query);
         $execute = $query_run->execute(array(":Titel" => $title,":Taal" => $Keuze,":Code" => $Code,
         ":Vraag" => $Vraag,":date" => $date,":User" => $User));
        
        if ($execute) {
             header("location:website.php");	
        } else {
            echo '<script type="text/javascript"> alert("Sorry voor het ongemak het is niet gelukt!") </script>';
        }   
    }
   	echo '<br><center><div class="wrapper">
			<div class="title">
			 Post</div>
	  <form action="" method="POST">
			  <div class="field">
				<input type="text" name="Titel" required>
				<label>Titel</label>
			  </div>
	  <div class="field">
        <input type="text" id="fname" name="Vraag" required>
        <label>Vraag</label>
			  </div>
	  <div class="content">
				<div class="checkbox">
				 <input type=checkbox id=checkbox1 name=Taal[] class="side1" value=PHP ><label for=checkbox1>PHP</label>
     <input type=checkbox id=checkbox2 name=Taal[] class="side2" value=Html ><label for=checkbox2>Html</label>
     <input type=checkbox id=checkbox3 name=Taal[]  class="side3" value=Css ><label for=checkbox3>Css</label>
     <input type=checkbox id=checkbox4 name=Taal[] class="side" value=Js ><label for=checkbox4>Js</label>
				</div>
     <input type="hidden" name="date" value="'.date("Y-m-d H:i:s").'">
     <input type="hidden" name="User" value="'.$_SESSION['username'].'">
	            </div>
     <div class="ewa">
     <textarea id="Code" name=Code></textarea required>
     </div>
	  <div class="field">
				<br><input type="submit" name="post" value="Submit">
			  </div>
	  </form>
	  </div></center>';
    echo '<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>';
} else {
  background($connect);
    navbar();
    sidenavbar();
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
    CKEDITOR.replace('Code');
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
