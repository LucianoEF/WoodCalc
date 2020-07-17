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
                <h3 class="text-center">Escolha do Modelo de Estrutura</h3>
                <br/>
                <br/>

                <!--botao tipo de material-->
                <div class="btn-group dropdown">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Escolha do Modelo
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="frmModeloI.php?op=cadastrar">Modelo I</a>
                        <a class="dropdown-item" href="frmModeloII.php?op=cadastrar">Modelo II</a>
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
        
        <!-- imagens -->
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h4><img src="../img/modelo1.png" width="475px" height="200px"><br/><br/>Modelo I</h4>
                </div>
                <div class="col text-center">
                    <h4><img src="../img/modelo2.png" width="475px" height="200px"><br/><br/>Modelo II</h4>
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
                <a href="abertura.php"><button type="reset" class="btn btn-danger btn-sm">Cancelar </button></a>
                <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
            </div>
        </div>
        </div>
    </body>
</html>                            
