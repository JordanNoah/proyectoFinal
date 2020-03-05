<?php
include "../core/mysql.php";
$db = new Db();

$data = $db->select("SELECT * from productos");
if (count($data)>0){
    $tableFormation = "";
    foreach($data as $datas){
        $tableFormation.="<tr><td>".$datas['nombre']."</td><td>".$datas['pvp']."</td><td>".$datas['cantStock']."</td><td>".$datas['categoria']."</td><td><button type='button' class='btn btn-success mr-2 edit' id=".$datas["id"]."><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button><button type='button' class='btn btn-danger removProduc' id=".$datas["id"]."><i class='fa fa-trash' aria-hidden='true'></i></button></td></tr>";
    }
    echo $tableFormation;
}
?>