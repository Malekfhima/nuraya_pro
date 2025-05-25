<?php
include '../cnx.php';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    extract($_POST);
    $list_ids = "/";
    $list_qua = "/";
    foreach($idp as $id){
        $list_ids = $list_ids . $id . "/" ;
    }
    foreach($qua as $q){
        $list_qua = $list_qua . $q . "/" ;
    }
    $result = mysqli_query($cnx , "INSERT into order values('$Fname','$Lname','$addr','$codep','$city','$tel','$email','$list_qua','$list_id');");
    mysqli_close($cnx);
}