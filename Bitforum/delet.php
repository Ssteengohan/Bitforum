<?php

if(isset($_SERVER['HTTP_REFERER'])) {
    $return = $_SERVER["HTTP_REFERER"];
    function deletecomments($connect) {
        if (isset($_POST['Delete'])) {
            $_POST["post_id"] = $_GET["id"];
            $id = $_POST["post_id"];
            $cid = $_POST['cid'];
            $sql = "DELETE FROM comments WHERE cid='$cid'";
            $result = $connect->query($sql);
        }
        }
        deletecomments($connect);
} else {   
    header("Location:".$return);
}

?>