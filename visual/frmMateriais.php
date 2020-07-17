<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>::WoodCalc::</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fonts/font-awesome.min.css">
<script src="../jquery/jquery-3.4.1.min.js"></script>
<script src="fonts/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
    .alinhar{
        margin: 20px;
    }
    .margem {margin-left: 20px;
    }
</style>
</head>
    <body>
       <?php  include "../core/verifica_session.php";
            include "menu.html";
        ?>
        
        <div class="row">
            <div class="col text-center">
                <!-- Título -->
                <h3 class="text-center">Escolha do Material</h3>
                <br/>
                <br/>

                <!--botao tipo de material-->
                <div class="btn-group dropdown">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Escolha do Material
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="frmMadeira.php?op=cadastrar">Madeira Verde</a>
                        <a class="dropdown-item" href="frmMadeiraUm.php?op=cadastrar">Madeira 15% úmida</a>
                        <a class="dropdown-item" href="frmTelha.php?op=cadastrar">Telha</a>
                        <a class="dropdown-item" href="frmPrego.php?op=cadastrar">Prego</a>
                        <a class="dropdown-item" href="frmParafuso.php?op=cadastrar">Parafuso</a>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        <!-- imagens -->
        <div class="container">
            <div class="row">
                <div style="margin-left: 120px;" class="col">
                    <img src="../img/wood.png" width="80px" height="80px">
                </div>
                <div class="col">
                    <img src="../img/roof.png" width="80px" height="80px">
                </div>
                <div class="col">
                    <img src="../img/nails.png" width="80px" height="80px">
                </div>
                <div class="col">
                    <img src="../img/screws.png" width="80px" height="80px">
                </div>
            </div>
        </div>
        <br/>
        <br/>

        <!-- btns -->
        <br />
        <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="gridMateriais.php"><button type="reset" class="btn btn-danger btn-sm">Cancelar </button></a>
                <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
            </div>
        </div>
        </div>
    </body>
</html>                            
