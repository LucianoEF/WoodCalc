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

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
        
        echo '<div class="row">
            <div class="col text-center">
                <!-- Título -->
                <h4 class="text-center"><img src="../img/roof.png" width="50px" height="50px">Cadastrar Telha</h4>
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

        <!--frmtelha -->
        <form name="frmtelha" action="../classes/operacoesTelha.php" method="post">
            <div class="row">
            <input type="hidden" name="categoria" value="Telha">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="categoria">Categoria<font color="red">*</font></label>
                    <select style="margin-left: 20px;" class="form-control" id="categoria" name="categoria" required>
                        <option>Telha</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="tipo">Tipo de Telha<font color="red">*</font></label>
                    <input type="text" class="form-control" id="tipo" name="tipotelha" required>
                </div>
                <div class="col"> 
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" >
                </div>
                <div class="col"> 
                    <label for="pesoproprio">Peso Próprio (kgf/m²)<font color="red">*</font></label>
                    <input type="text" class="form-control" id="pesoproprio" name="pesoproprio" >
                </div>
            </div>

            <!--frmtelha -->
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="expessura">Expessura (mm)<font color="red">*</font></label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="expessura" name="expessura">
                </div>
                <div class="col"> 
                    <label for="qtdapoios">Quantidade de apoios<font color="red">*</font></label>
                    <input type="text" class="form-control" id="qtdapoios" name="qtdapoios" required>
                </div>
                <div class="col"> 
                    <label for="distapoios">Distância entre apoios (m)<font color="red">*</font></label>
                    <input type="text" class="form-control" id="distapoios" name="distapoios" >
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
        </form>';
        }

        //Alterar dados da Telha
        if ($operacao == 'alterar') {
            $telha = $_GET['telhaData'];
            
            //Conexão com o Base de Dados
            include '../core/Database.php';
            $pdo = Database::connect();

            //Selecionar dados da madeira especifica
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT *  FROM telha_tbl WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($telha));

            echo '<h4 class="text-center"><img src="../img/refresh.png" width="35px" height="35px">Alterar Telha</h4>
            <br/>

            <!--frmTelha -->
        <form name="frmtelha" action="../classes/operacoesTelha.php" method="post">';
        foreach ($q as $row){
            echo'<div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="categoria">Categoria<font color="red">*</font></label>
                        <select style="margin-left: 20px;" class="form-control" id="categoria" name="categoria" value="'.$row['categoria'] .'" required>
                            <option>Telha</option>
                        </select>
                </div>
                <div class="col"> 
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="'.$row['descricao'] .'">
                </div>
                <div class="col"> 
                    <label for="pesoproprio">Peso Próprio (kgf/m²)</label>
                    <input type="text" class="form-control" id="pesoproprio" name="pesoproprio" value="'.$row['pesoproprio'] .'">
                </div>
            </div>

            <!--frmtelha -->
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="expessura">Expessura (mm)</label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="expessura" name="expessura" value="'.$row['expessura'] .'">
                </div>
                <div class="col"> 
                    <label for="qtdapoios">Quantidade de apoios<font color="red">*</font></label>
                    <input type="text" class="form-control" id="qtdapoios" name="qtdapoios" value="'.$row['qtdapoios'] .'" required>
                </div>
                <div class="col"> 
                    <label for="distapoios">Distância entre apoios</label>
                    <input type="text" class="form-control" id="distapoios" name="distapoios" value="'.$row['distapoios'] .'">
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
                    <input type="hidden" id="acao" name="acao" value="alterar">
                    <input type="hidden" id="user" name="telhaData" value="'.$telha.'">
                        <a href="#"><button type="submit" class="btn btn-info btn-sm">Alterar </button></a>
                        <a href="../visual/gridMateriais.php" class="btn btn-danger btn-sm">Cancelar</a>

                    <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
                </div>
            </div>
        </form>';
        }
        }
        ?>
    </body>
</html>                            
