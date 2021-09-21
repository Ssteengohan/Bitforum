<?php
if(isset($_SERVER["HTTP_REFERER"])) {

 $return = $_SERVER["HTTP_REFERER"];
  function dislike($connect) {
    if (isset($_POST['dislike'])) {
     
        $_POST["post_id"] = $_GET["id"];
        $id = $_POST["post_id"];
        $cid = $_POST['cid'];
        $user = $_POST["uid"];
        $sql = "DELETE FROM likes WHERE user='$user' AND comid='$cid'";
        $result = $connect->query($sql);
        if ($result) {
            $sql2 = "UPDATE `comments` SET `likes` = 'points - 1' WHERE `comments`.`cid` = '$cid'";
            $run = $connect->query($sql2);
        }
       
    }
}
function like($connect) {
    if (isset($_POST["like"])) {
     
        $_POST["post_id"] = $_GET["id"];
        $ids = $_POST["post_id"];
        $id = $_POST["like"];
        $cid = $_POST["cid"];
        $user = $_POST["uid"];
        $type = "comments";
         $sql1 = "INSERT INTO `likes` (`user`, `comid`, `type`)
        SELECT * FROM (SELECT '$user', '$cid', '$type') AS tmp
        WHERE NOT EXISTS (
            SELECT user, comid FROM `likes` WHERE user = '$user' AND comid = '$cid'
        ) LIMIT 1;";
        $sql_run = $connect->prepare($sql1);
        $exe = $sql_run->execute(array(":user" => $user, ":comid" => $cid, ":type" => $type));

        if ($exe) {
            $sql2 = "UPDATE `comments` SET `likes` = '1' WHERE `comments`.`cid` = '$cid'";
            $run = $connect->query($sql2);
        }
  
    }
}
  dislike($connect);
  like($connect);
} else {
header("Location:".$return);
}


?>