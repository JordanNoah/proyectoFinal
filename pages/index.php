<?php
session_start();
if($_SESSION["idUser"]==""){
    echo '<script>window.location.assign("http://localhost/proyectHipermedial/pages/login.php");</script>';
}
include "../includes/header.php";
include "../includes/menu.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12"><h2>Seleccione del menu lateral</h2></div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>