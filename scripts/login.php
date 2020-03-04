<?php
    include "../core/mysql.php";
    $user=$_POST["userNamer"];
    $password=$_POST["password"];

    $db = new Db();

    $check1=$db->select("SELECT * FROM usuarios where userName = '$user'");
    if(count($check1)>0){
        $check2=$db->select("SELECT * FROM usuarios where userName = '$user' and passwords = '$password'");
        if(count($check2)>0){
            echo "1";
            session_start();
            $_SESSION["idUser"]=$check2[0]["id"];
        }else{
            echo "0";
        }
    }else{
        echo "2";
    }
?>