<?php
include "../core/mysql.php";
$db = new Db();


$data = $db->select("SELECT * FROM categoria");
if(count($data)>0){
    $envio="";
    foreach($data as $datas){
    $envio.="<tr><td>".$datas["nombre"]."</td><td><button type='button' class='btn btn-success mr-2 edit' id=".$datas["id"]."><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button><button type='button' class='btn btn-danger edit' id=".$datas["id"]."><i class='fa fa-trash' aria-hidden='true'></i></button></td></tr>";       
    }
    echo $envio;
}else{
    echo "0";
}
?>