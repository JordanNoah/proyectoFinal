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
        <div class="col-12">
            <h3>Control de stock de productos</h3>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control nombreProducts" placeholder="Nombre productos" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control pvp" placeholder="P.V.P" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="number" class="form-control cantStock" placeholder="Cant. stock" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary mb-3 saveProducts">Guardar</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre producto</th>
                                <th scope="col">P.V.P</th>
                                <th scope="col">Cantidad Stock</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="bodyProducts">
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categia Productos</h5>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control nombreCategoria" placeholder="Categoria Producto" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <button type="button" class="btn btn-primary mb-3 saveCategoria">Guardar</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpoCate">
                            <tr>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click",".removCate",function(){
        var id = $(this).attr("id");
        $.ajax({
            type:"post",
            url:"http://localhost/proyectHipermedial/scripts/removeCate.php",
            data:{
                id:id
            },
            success:function(res){
                if(res!="0"){
                    llenartablaCategoria();
                }
            }
        });
    });
    $(document).on("click",".removProduc",function(){
        var id = $(this).attr("id");
        $.ajax({
            type:"post",
            url:"http://localhost/proyectHipermedial/scripts/removeProduct.php",
            data:{
                id:id
            },
            success:function(res){
                if(res!="0"){
                    llenarTablaProductos();
                }
            }
        });
    });
    $("document").ready(function(){
        llenartablaCategoria();
        llenarTablaProductos();
        llenarCombo();
    });
    function llenarCombo(){
        $.ajax({
            url:"http://localhost/proyectHipermedial/scripts/callTableCateg.php",
            success:function(res){
                if(res!="0"){
                    $(".cuerpoCate").empty().append(res);
                }
            }
        });
    }
    function llenartablaCategoria(){
        $.ajax({
            url:"http://localhost/proyectHipermedial/scripts/categCombo.php",
            success:function(res){
                if(res!="0"){
                    $("#inputGroupSelect01").empty().append(res);
                }
            }
        });
    }
    $(".saveProducts").click(function(){
        var nombreProducts = $(".nombreProducts").val();
        var pvp = $(".pvp").val();
        var categoria = $(".custom-select").val();
        var cantStock = $(".cantStock").val();
        $.ajax({
            type:"post",
            url:"http://localhost/proyectHipermedial/scripts/saveProductos.php",
            data:{
                nombreProducts:nombreProducts,
                pvp:pvp,
                categoria:categoria,
                cantStock:cantStock
            },
            success:function(res){
                if(res!="0"){
                    llenarTablaProductos();
                }
            }
        });
    });
    function llenarTablaProductos(){
        $.ajax({
            url:"http://localhost/proyectHipermedial/scripts/callTableProductos.php",
            success:function(res){
                if(res!="0"){
                    $(".bodyProducts").empty().append(res);
                }
            }
        });
    }
    $(".saveCategoria").click(function(){
        var nombreCategoria = $(".nombreCategoria").val();
        $.ajax({
            type:"post",
            url:"http://localhost/proyectHipermedial/scripts/saveCategoria.php",
            data:{
                nombreCategoria:nombreCategoria
            },
            success:function(res){
                if(res=="1"){accionPositiva();}
            }
        });
    });
    function accionPositiva(){
        alert("GUARDADO EXITOSO");
        $(".nombreCategoria").val('');
        llenartablaCategoria();
    }
</script>
<?php
include "../includes/footer.php";
?>