<?php
include "../core/mysql.php";
$db = new Db();


$data = $db->select("SELECT * FROM categoria");
if(count($data)>0){
    $envio="";
    foreach($data as $datas){
    $envio.="<option value='".$datas['id']."'>".$datas["nombre"]."</option>";       
    }
    echo $envio;
}else{
    echo "0";
}
?>