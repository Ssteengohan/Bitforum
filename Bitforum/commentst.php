<?php
include 'dbh.php';

    function insertcomment($connect) {
        if (isset($_POST['commentsubmit'])) {
            $_POST["post_id"] = $_GET["id"];
            $id = $_POST["post_id"];
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $message = $_POST['commenst'];
            $sql = "INSERT INTO `comments` (`uid`, `date`, `message`, `post_id`) VALUES (:uid, :date, :message, :post_id) LIMIT 1";
            $sql_run = $connect->prepare($sql);
            $exe = $sql_run->execute(array(":uid" => $uid, ":date" => $date, ":message" => $message, ":post_id" => $id)); 
        }
    }
    insertcomment($connect);
?>

