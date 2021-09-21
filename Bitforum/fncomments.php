<?php

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
    $qu3 = $connect->prepare("SELECT COUNT(`comid`) FROM  likes WHERE comid = :id");
    $id = $eerste["cid"];
    $qu3->execute(array(
       ':id'    => $id
   ));
    if($eerste3 = $qu3->fetch()) {
    echo '<center><div class="all">
         <div class="reacties"><p>';
    echo "<div class='midden'>";
    echo  "<div class='uid'><p class='uid1'>".$eerste["uid"]."</p></div>";
    echo  "<div class='midkl'><p class=''midm'>".$eerste['message']."</p></div><br>";
    echo  "<div class='date'>".$eerste["date"]."</div>";
    echo  "<div class=geliked>";
    echo  $eerste3["COUNT(`comid`)"];
    echo "</div></div>";
    echo "</p><center>";
    if (isset($_SESSION['username'])) {
        $user = $_SESSION["username"];
        if ($_SESSION['username'] == $eerste2['username']) {
            echo '<center><form class="delete-form" action="'.deletecomments($connect).'" method="POST">
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <a href="delet.php"><button type="submit" name="Delete">Delete</button></a></form>';
            echo '<form class="edit-form" action="edit.php" method="POST">
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <input type="hidden" name="uid" value="' . $eerste["uid"] . '">
            <input type="hidden" name="date" value="' . $eerste["date"] . '">
            <input type="hidden" name="message" value="' . $eerste["message"] . '">
            <button class="Edit" name="edit">Edit</button>
            </form></center>'; 
        } else {
            echo '<form class="edit-form" action="" method="POST">
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <button type="submit" name="reply">reply</button></form></div>';
            echo '<form action="' .like($connect). '" method="POST">
           <div class="like"><a href="likes.php"><button onclick="myFunction(this)" name="like" value="" class="fa fa-thumbs-up"></a></button></div>
            <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
            <input type="hidden" name="uid" value="'.$user.'">
                 </form><form action="' .dislike($connect). '" method="POST">
                 <div class="dislike"><a href="likes.php"><button onclick="myFunction(this)" name="dislike"class="fa fa-thumbs-down"></button></a></div>
                  <input type="hidden" name="cid" value="' . $eerste["cid"] . '">
                  <input type="hidden" name="uid" value="'.$user.'">
                 
                   </form>';
        }
    } else {
        echo "<div class='reacties1'><p class='reply'><a class='reag' href='login.php'>Login om te reageren</a></p>";
    }
    echo "</div></div><hr></div>";
   }
    }
}
}


function sentcomment($connect) {
       echo "<center><form class='comment' id='hello'  method='POST' action=''>
     <input type='hidden' name='uid' value='".$_SESSION["username"]."'>
     <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
     <div class='ewa1'>
     <textarea class='text' name='commenst'></textarea><br>
     </div><br>
     <a href='commentst.php'><button class='button' type'submit' name='commentsubmit' >Comment</button></a>
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
        echo "<script>history.go(-2);</script>";
    }
}





?>