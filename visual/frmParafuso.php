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
                <h4 class="text-center"><img src="../img/screws.png" width="50px" height="50px">Cadastrar Parafuso</h4>
                <br/>
                <br/>

                <!--botao tipo de material-->
                <div class="btn-group dropright">
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
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>

        <!--frmParafuso -->
        <form name="frmParafuso" action="../classes/operacoesParafuso.php" method="post">
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="categoria">Categoria<font color="red">*</font></label>
                    <select style="margin-left: 20px;" class="form-control" id="categoria" name="categoria" required>
                        <option>Parafuso</option>
-                    </select>
                </div>
                <div class="col"> 
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" >
                </div>
                <div class="col"> 
                    <label for="polegadas">Polegadas</label>
                    <input type="text" class="form-control" id="polegadas" name="polegadas" >
                </div>
            </div>

            <!--propriedadesMecanicas -->
        <form name="frmParafuso" action="#" method="post">
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="lmtescoamento">Limite de Escoamento (kgf/mm²)<font color="red">*</font></label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="lmtescoamento" name="lmtescoamento">
                </div>
                <div class="col"> 
                    <label for="resistracao">Resistência a Tração<font color="red">*</font></label>
                    <input type="text" class="form-control" id="resistracao" name="resistracao" required>
                </div>
                <div class="col"> 
                    <label for="cargaprova">Carga de Prova<font color="red">*</font></label>
                    <input type="text" class="form-control" id="cargaprova" name="cargaprova" >
                </div>
            </div>
                        
            <!-- documentos -->
            <!-- <div class="row">
                <div class="col"> 
                    <label for="datacad">Data de Cadastro</label>
                    <input type="date" class="form-control" id="datacad" name="datacad" readonly>
                </div>
                <div class="col"> 
                    <label for="dataultalter">Data Ultima Atera&ccedil;&atilde;o</label>
                    <input type="date" class="form-control" id="dataultalter" name="dataultalter" readonly>
                </div>
                <div class="col"> 
                    <label for="userultalter">Usu&aacute;rio Ult. Atera&ccedil;&atilde;o </label>
                    <input type="text" class="form-control" id="userultalter" name="userultalter" readonly>
                </div>                
            </div> -->
            <!-- btns -->
            <br />
            <div class="container">
            <div class="row">
                <div class="col text-center">
                    <input type="hidden" id="acao" name="acao" value="cadastrar">
                    <a href="#"><button type="submit" class="btn btn-info btn-sm">Cadastrar </button></a>
                    <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                    <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
                </div>
            </div>
        </form>
    </body>
</html>                            
