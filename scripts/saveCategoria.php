<?php
include "../core/mysql.php";
$db = new Db();

$nombre = $_POST["nombreCategoria"];

if($db->query("INSERT INTO categoria (nombre,statu) value('$nombre','1')")){
    echo "1";
}else{
    echo "0";
}
?>