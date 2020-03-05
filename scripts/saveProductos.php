<?php
include "../core/mysql.php";
$db = new Db();

$nombreProducts=$_POST["nombreProducts"];
$pvp=$_POST["pvp"];
$categoria=$_POST["categoria"];
$cantStock=$_POST["cantStock"];

if($db->query("INSERT INTO productos (nombre,pvp,cantStock,categoria) values ('$nombreProducts','$pvp','$cantStock','$categoria')")){
    echo "1";
}else{
    echo "0";
}
?>