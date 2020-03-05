<?php
include "../core/mysql.php";
$db = new Db();

$id = $_POST["id"];

if($db->query("DELETE from productos where id = $id")){
    echo "1";
}else{
    echo "0";
}
?>