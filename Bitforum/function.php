<?php

    function userlogout($connect) {
        if (isset($_POST['logoutsubmit'])) {
            session_start();
            session_destroy();
            header("Refresh:0");
            exit();
        }
    }
function commitpost($connect) {  
    if (isset($_POST['post'])) {
        $title = $_POST['Titel'];
        $Taal = $_POST['Taal'];
        $Keuze = "";
        foreach($Taal as $keuze1) {
            $keuze = $keuze1;
        } 
        $date = $_POST['date'];
        $Code = $_POST['Code'];
        $Vraag = $_POST['Vraag'];
        $User = $_POST['User'];
    
        
         $query = "INSERT INTO `post` (`Titel`, `Taal`, `Code`, `Vraag`, `date`, `User`)
         VALUES (:Titel,:Taal,:Code,:Vraag,:date ,:User)" ;
         $query_run = $connect->prepare($query);
         $execute = $query_run->execute(array(":Titel" => $title,":Taal" => $keuze,":Code" => $Code,
         ":Vraag" => $Vraag,":date" => $date,":User" => $User));
        
        if ($execute) {
             header("location:website.php");	
        } else {
            echo '<script type="text/javascript"> alert("Sorry voor het ongemak het is niet gelukt!") </script>';
        }   
    }
    echo '<center><form action="" class="post1" method="POST"> <h1></h1>
    <h3>Titel<br><input type="text" id="fname" name="Titel"></h3>
    <h3>Taal<br>
    <input type=checkbox id=checkbox1 name=Taal[] class="side1" value=PHP ><label for=checkbox1>PHP</label><br>
    <input type=checkbox id=checkbox2 name=Taal[] class="side2" value=Html ><label for=checkbox2>Html</label><br>
    <input type=checkbox id=checkbox3 name=Taal[]  class="side3" value=Css ><label for=checkbox3>Css</label><br>
    <input type=checkbox id=checkbox4 name=Taal[] class="side" value=Javascript ><label for=checkbox4>Javascript</label>
    </h3><br>
    <h3>Code<br><textarea id="Code" name="Code" rows="2" cols="50"></textarea></h3>
    <input type="hidden" name="date" value="'.date("Y-m-d H:i:s").'">
    <h3>Vraag<br><input type="text" id="fname" name="Vraag"> </h3>
    <input type="hidden" name="User" value="'.$_SESSION['username'].'">
    <button type="submit"  name="post">Post</button>
    </form></center>
    ';
     }
function Post($connect) {
   echo "<div class='filterposi'>
    <div class='filter'>
        <div class='filterrechts'>
            <div class='href'>
                <a class='nieuw' href='scrum.php'>Probleem posten<a>
            </div>
        </div>

        <div class='filterlinks'>
        
            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='nieuw' value='id' >Nieuw</button> 
                </form>
            </div>

            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='Html'>Html</button>
            </form>
            </div>
            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='Css'>Css</button>  
            </form>
            </div>
            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='PHP'>PHP</button>
                </form>
            </div>

            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='Javascript'>Js</button>
            </div>
            </form>
        </div>
    </div>
</div>";
    $query = "SELECT * FROM post";
    $i = 0;
    $statement = $connect->query($query);
   foreach ($statement as $eerste) {
       $i++;
       echo '<center><div class="post">
             <div class="Titel"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Titel"] . '</a></h1></div>
             <div class="Vraag"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Vraag"] . '</a></h1></div>
             <div class="Taal"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Taal"] . '</a></h1></div>
             <div class="User"><h1><a href=post.php?id=' . $i .'>'  . $eerste["User"] . '</a></h1></div>
             <div class="Date"><h1><a href=post.php?id=' . $i .'>'  . $eerste["date"] . '</a></h1></div>
             </center></div>';
    }
}
 
function filter($connect) {
    if(isset($_POST['code'])) {
        echo "<div class='filterposi'>
        <div class='filter'>
            <div class='filterrechts'>
                <div class='href'>
                    <a class='nieuw' href='scrum.php'>Probleem posten<a>
                </div>
            </div>
    
            <div class='filterlinks'>
            
                <div class='positienieuw'>
                <form action='' method='POST'>
                <button type='submit' class='nieuw' name='nieuw' value='id' >Nieuw</button> 
                    </form>
                </div>
    
                <div class='positienieuw'>
                <form action='' method='POST'>
                <button type='submit' class='nieuw' name='code' value='Html'>Html</button>
                </form>
                </div>
                <div class='positienieuw'>
                <form action='' method='POST'>
                <button type='submit' class='nieuw' name='code' value='Css'>Css</button>  
                </form>
                </div>
                <div class='positienieuw'>
                <form action='' method='POST'>
                <button type='submit' class='nieuw' name='code' value='PHP'>PHP</button>
                    </form>
                </div>
    
                <div class='positienieuw'>
                <form action='' method='POST'>
                <button type='submit' class='nieuw' name='code' value='Javascript'>Js</button>
                </div>
                </form>
            </div>
        </div>
    </div>";
        $filter = $_POST['code'];
        $query = "SELECT * FROM post WHERE Taal LIKE '%$filter%'";
        $i = 0;
        $statement = $connect->query($query);
       foreach ($statement as $eerste) {
           $i++;
           echo '<center><div class="post">
                 <div class="Titel"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Titel"] . '</a></h1></div>
                 <div class="Vraag"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Vraag"] . '</a></h1></div>
                 <div class="Taal"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Taal"] . '</a></h1></div>
                 <div class="User"><h1><a href=post.php?id=' . $i .'>'  . $eerste["User"] . '</a></h1></div>
                 <div class="Date"><h1><a href=post.php?id=' . $i .'>'  . $eerste["date"] . '</a></h1></div>
                 </center></div>';
             
      
    }
} else {
    Post($connect);
} 
}

function nieuw($connect) {
        if(isset($_POST['nieuw'])) {
            echo "<div class='filterposi'>
            <div class='filter'>
                <div class='filterrechts'>
                    <div class='href'>
                        <a class='nieuw' href='scrum.php'>Probleem posten<a>
                    </div>
                </div>
        
                <div class='filterlinks'>
                
                    <div class='positienieuw'>
                    <form action='' method='POST'>
                    <button type='submit' class='nieuw' name='nieuw' value='id' >Nieuw</button> 
                        </form>
                    </div>
        
                    <div class='positienieuw'>
                    <form action='' method='POST'>
                    <button type='submit' class='nieuw' name='code' value='Html'>Html</button>
                    </form>
                    </div>
                    <div class='positienieuw'>
                    <form action='' method='POST'>
                    <button type='submit' class='nieuw' name='code' value='Css'>Css</button>  
                    </form>
                    </div>
                    <div class='positienieuw'>
                    <form action='' method='POST'>
                    <button type='submit' class='nieuw' name='code' value='PHP'>PHP</button>
                        </form>
                    </div>
        
                    <div class='positienieuw'>
                    <form action='' method='POST'>
                    <button type='submit' class='nieuw' name='code' value='Javascript'>Js</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>";
            $filter = $_POST['nieuw'];
            $query = "SELECT * FROM post WHERE id ORDER BY id DESC";
            $i = 0;
            $statement = $connect->query($query);
           foreach ($statement as $eerste) {
               $i++;
               echo '<center><div class="post">
                     <div class="Titel"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Titel"] . '</a></h1></div>
                     <div class="Vraag"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Vraag"] . '</a></h1></div>
                     <div class="Taal"><h1><a href=post.php?id=' . $i .'>'  . $eerste["Taal"] . '</a></h1></div>
                     <div class="User"><h1><a href=post.php?id=' . $i .'>'  . $eerste["User"] . '</a></h1></div>
                     <div class="Date"><h1><a href=post.php?id=' . $i .'>'  . $eerste["date"] . '</a></h1></div>
                     </center></div>';
                 
          
        }
    } else {
        filter($connect);
    }
}
function showpost($connect)  {
    $statement = $connect->prepare("SELECT * FROM `post` WHERE id = :id");
    $id = $_GET["id"];
    $statement->execute(array(
         ':id'    => $id
    ));
    foreach ($statement as $eerste) {
        $statement2 = $connect->prepare("SELECT * FROM `post` WHERE id = :id");
        $id = $_GET["id"];
        $statement2->execute(array(
             ':id'    => $id
        ));
        if ($eerste2 = $statement2->fetch()) {
                    echo '<center><div class="postenen1"><h1>'  . $eerste["Titel"] . '</h1>
     <h2>Taal : ' . $eerste["Taal"] . '</h2>
     <h2>Code : ' . $eerste["Code"] . '</h2>
     <h2>Vraag : ' . $eerste["Vraag"] . '</h2>
     <h2>Datum : ' . $eerste["date"] . '</h2>
     <h2>User : ' . $eerste["User"] . '</h2></center>';
     if (isset($_SESSION['username'])) {
         if ($_SESSION['username'] == $eerste2["User"]) {
            echo '<center><form class="deletepost" action="'.deletepost($connect).'" method="POST">
            <input type="hidden" name="id" value="' . $eerste["id"] . '">
            <button type="submit" name="Deletepost">Delete</button></form></center';
         }
     }
        }
     }
    }
function comment($connect) {
    $qu = $connect->prepare("SELECT * FROM  comments WHERE post_id = :id");
    $id = $_GET["id"];
    $qu->execute(array(
       ':id'    => $id
   ));
    
  while ($eerste = $qu->fetch()) {
    $qu2 = $connect->prepare("SELECT * FROM  gebruikers WHERE username = :id");
    $id = $eerste["uid"];
    $qu2->execute(array(
       ':id'    => $id
   ));
   if ($eerste2 = $qu2->fetch()) {
    echo '<center>
    <div class="reacties"><p>';
    echo  $eerste["uid"]."<br>";
    echo  $eerste["message"];
    echo  $eerste["date"];
    echo "</p>";
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] == $eerste2['username']) {
            echo '<form class="delete-form" action="'.deletecomments($connect).'" method="POST">
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <button type="submit" name="Delete">Delete</button></form>';
            echo '<form class="edit-form" action="edit.php" method="POST">
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <input type="hidden" name="uid" value="' . $eerste["uid"] . '">
            <input type="hidden" name="date" value="' . $eerste["date"] . '">
            <input type="hidden" name="message" value="' . $eerste["message"] . '">
            <button name="edit">Edit</button>
            </form></center>'; 
        } else {
            echo '<form class="edit-form" action="" method="POST">
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <button type="submit" name="reply">reply</button></form>';
        }
    } else {
        echo "<p class='reply'><a href='login.php'>Login om te reageren</a></p>";
    }
    echo "</div>";
   }
    }
}

function sentcomment($connect) {
    if (isset($_POST['commentsubmit'])) {
        $_POST["post_id"] = $_GET["id"];
        $id = $_POST["post_id"];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
    
        $sql = "INSERT INTO `comments` (`uid`, `date`, `message`, `post_id`) VALUES (:uid, :date, :message, :post_id)";
        $sql_run = $connect->prepare($sql);
        $exe = $sql_run->execute(array(":uid" => $uid, ":date" => $date, ":message" => $message, ":post_id" => $id));
        if ($exe) {
            header("Refresh:0");	
     } 
    }
       echo "<center><form class='comment' id='hello'  method='POST' action=''>
     <input type='hidden' name='uid' value='".$_SESSION["username"]."'>
     <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
     <textarea class='text' name='message'></textarea><br>
     <button class='button' type'submit' name='commentsubmit' >Comment</button>
     </form>
     <div id='ans'></div></center>";   
}

function editcomments($connect) {
    if (isset($_POST['commentssubmit'])) {
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $connect->query($sql);
        header("location: edit.php");
    }
}
function deletecomments($connect) {
if (isset($_POST['Delete'])) {
    $cid = $_POST['cid'];
    $sql = "DELETE FROM comments WHERE cid='$cid'";
    $result = $connect->query($sql);
    header("Refresh:0");
}
}
function deletepost($connect) {
    if (isset($_POST['Deletepost'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM post WHERE id='$id'";
        $result = $connect->query($sql);
        header("Refresh:0");
}
}
function navbar() {
        echo "
        <html lang='en'>
        
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='style.css'>
            <script src='script.js'></script>
            <title>Bit Forum</title>
        </head>
        
        <body class='body'>
        
            <div class='boven' id='hidenavbar'>
                <div class='navbar'>
        
                    <div>
                        <a href=website.php>
                        <img class='image' src='logo_small.png'>
                        </a>
                    </div>
        
                    <div class='zoekbalk'>
                        <form action='/action_page.php'>
                            <input  type='text' class='zoekbalk' placeholder='Zoeken' name='search'>
                        </form>
                    </div>
        
                    <div class='inloggen'>
                        <div class='knoppen'>
                            <form action='' method='POST'>
                            <a class='login' href='login.php'>Login</a>
                            <a class='registreer' href='Registreer.php'>Registreer</a>
                              </form>            
                        </div>
        
                        <div class='float_right'>
                            <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                        class='png mens' src='outline_account_circle_white_24dp.png'><img
                                        class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                                <ul style='list-style-type:none' class='dropdown_ul'>
                                    <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                    </li>
                                    <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        
            <div>
            </div>
        
            <div>
            </div>
        
        </body>
        
        </html>";
}
        
function loggednavbar($connect) {
            echo "
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='style.css'>
                <script src='script.js'></script>
                <title>Bit Forum</title>
            </head>
            
            <body class='body'>
            
                <div class='boven' id='hidenavbar'>
                    <div class='navbar'>
            
                        <div>
                            <a href=website.php>
                            <img class='image' src='logo_small.png'>
                            </a>
                        </div>
            
                        <div class='zoekbalk'>
                            <form action='/action_page.php'>
                                <input class='zoekbalk' type='text' placeholder='Zoeken' name='search'>
                            </form>
                        </div>
            
                        <div class='inloggen'>
                            <div class='knoppen'>
                            <form method='POST' action='".userlogout($connect)."'>
                                
                            <button type='submit' class='logout' name='logoutsubmit'>Uitloggen</button>
                                  </form>            
                            </div>
            
                            <div class='float_right'>
                                <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                            class='png mens' src='outline_account_circle_white_24dp.png'><img
                                            class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                                    <ul style='list-style-type:none' class='dropdown_ul'>
                                        <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                        </li>
                                        <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                        </li>
                                    </ul>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div>
                </div>
            
                <div>
                </div>
            
            </body>
            
            </html>";
}     
function logged($connect) {
    echo "
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <script src='script.js'></script>
        <title>Bit Forum</title>
    </head>
    
    <body class='body'>
    
        <div class='boven' id='hidenavbar'>
            <div class='navbar'>
    
                <div>
                    <a href=website.php>
                    <img class='image' src='logo_small.png'>
                    </a>
                </div>
    
                <div class='zoekbalk'>
                    <form action='/action_page.php'>
                        <input  type='hidden' class='zoekbalk' placeholder='Zoeken' name='search'>
                    </form>
                </div>
    
                <div class='inloggen'>
                    <div class='knoppen'>
                        <form action='' method='POST'>
                        <a class='login' href='login.php'>Login</a>
                        <a class='registreer' href='Registreer.php'>Registreer</a>
                          </form>            
                    </div>
    
                    <div class='float_right'>
                        <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                    class='png mens' src='outline_account_circle_white_24dp.png'><img
                                    class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                            <ul style='list-style-type:none' class='dropdown_ul'>
                                <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                </li>
                                <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    
        <div>
        </div>
    
        <div>
        </div>
    
    </body>
    
    </html>";
}   
?>
