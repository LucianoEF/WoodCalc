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
                    <h4 class="text-center"><img src="../img/wood.png" width="50px" height="50px">Cadastrar Madeira Verde</h4>
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

            <!--frmMadeira -->
            <form name="frmMadeira" action="../classes/operacoesMadeira.php" method="post">
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="categoria">Categoria<font color="red">*</font></label>
                        <select style="margin-left: 20px;" class="form-control" id="categoria" name="categoria" required>
                            <option>Madeira</option>
-                       </select>
                    </div>
                    <div class="col"> 
                        <label for="tipo">Tipo de Madeira<font color="red">*</font></label>
                        <select class="form-control" id="tipo" name="tipomadeira" required>
                            <option value="Maciça">Maciça</option>
                            <option value="Lamelada Colada">Lamelada Colada</option>
                            <option value="LVL">LVL</option>
                            <option value="OSB">OSB</option>
                            <option value="Contraplacado">Contraplacado</option>
                            <option value="Aglomerado de Partículas">Aglomerado de Partículas</option>
                            <option value="Aglomerado de fibras duro">Aglomerado de fibras duro</option>
                            <option value="Aglomerado de fibras médio">Aglomerado de fibras médio</option>
-                       </select>
                    </div>
                    <div class="col"> 
                        <label for="genero">Gênero<font color="red">*</font></label>
                        <input type="text" class="form-control" id="genero" name="genero" required>
                    </div>
                    <div class="col"> 
                        <label for="especie">Espécie<font color="red">*</font></label>
                        <input type="text" class="form-control" id="especie" name="especie" required>
                    </div>
                    <div class="col"> 
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" >
                    </div>
                </div>

                <!-- Primeira linha - DadosTecnicos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="rbas">Peso Específico (kg/m³)<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="rbas" name="rbas">
                    </div>
                    <div class="col"> 
                        <label for="ec0">Módulo de elasticidade (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="ec0" name="ec0" >
                    </div>
                </div>

                <!-- Segunda linha - Dados Tecnicos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="fm">Resist. à flexão (kgf/cm²)<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="fm" name="fm" required>
                    </div>
                    <div class="col"> 
                        <label for="ft0">Resist. à Tração 0° (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="ft0" name="ft0" required>
                    </div>
                    <div class="col"> 
                        <label for="ft90">Resist. à Tração 90° (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="ft90" name="ft90" required>
                    </div>
                </div>

                <!-- Terceira linha - Dados Tecnicos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="fc0">Resist. à Compressão (kgf/cm²)<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="fc0" name="fc0" >
                    </div>
                    <div class="col"> 
                        <label for="fv">Resist. Cisalhamento (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="fv" name="fv" required>
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

        //Alterar dados da Madeira
        if ($operacao == 'alterar') {
            $madeira = $_GET['madeiraData'];
            
            //Conexão com o Base de Dados
            include '../core/Database.php';
            $pdo = Database::connect();

            //Selecionar dados da madeira especifica
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT *  FROM madeira_tbl WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($madeira));

            echo '<h4 class="text-center"><img src="../img/refresh.png" width="35px" height="35px">Alterar Madeira</h4>
            <br/>

            <!--frmMadeira -->
            <form name="frmMadeira" action="../classes/operacoesMadeira.php" method="post">';
            foreach ($q as $row){
                echo'<div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="genero">Gênero<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="genero" name="genero" value="'.$row['genero'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="especie">Espécie<font color="red">*</font></label>
                        <input type="text" class="form-control" id="especie" name="especie" value="'.$row['especie'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="'.$row['descricao'] .'">
                    </div>
                </div>

                <!-- Primeira linha - DadosTecnicos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="rbas">Peso Específico (kg/m³)<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="rbas" name="rbas" value="'.$row['rbas'] .'">
                    </div>
                    <div class="col"> 
                        <label for="ec0">Módulo de elasticidade (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="ec0" name="ec0" value="'.$row['ec0'] .'">
                    </div>
                </div>

                <!-- Segunda linha - Dados Tecnicos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="fm">Resist. à flexão (kgf/cm²)<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="fm" name="fm" value="'.$row['fm'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="ft0">Resist. à Tração 0° (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="ft0" name="ft0" value="'.$row['ft0'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="ft90">Resist. à Tração 90° (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="ft90" name="ft90" value="'.$row['ft90'] .'" required>
                    </div>
                </div>

                <!-- Terceira linha - Dados Tecnicos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="fc0">Resist. à Compressão (kgf/cm²)<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="fc0" name="fc0" value="'.$row['fc0'] .'">
                    </div>
                    <div class="col"> 
                        <label for="fv">Resist. Cisalhamento (kgf/cm²)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="fv" name="fv" value="'.$row['fv'] .'" required>
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
                        <input type="hidden" id="user" name="madeiraData" value="'.$madeira.'">
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
