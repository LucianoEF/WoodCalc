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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<style type="text/css">
    .alinhar{
        margin: 20px;
    }
    .margem {margin-left: 20px;
    }
</style>
    <?php
        include "../core/verifica_session.php";
        include "menu.html";
    ?>
</head>
    <body>
       <?php 

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<h4 class="text-center">Cadastrar Cliente</h4>
            <br/>

        <!--frmClientes -->
        <form name="frmClientes" action="../classes/operacoesClientes.php" method="post">
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="tipo">Tipo</label>
                    <select style="margin-left: 20px;" class="form-control" id="tipo" name="tipo" required>
                        <option>Físico</option>
                        <option>Jurídico</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="nome">Nome Completo<font color="red">*</font></label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="col"> 
                    <label for="date">Dt. Nascimento</label>
                    <input type="date" class="form-control" id="date" name="dtNasc">
                </div>
            </div>
            <!-- contato -->
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="telfixo">Telefone </label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="telfixo" name="telfixo">
                </div>
                <div class="col"> 
                    <label for="celular">Celular <font color="red">*</font></label>
                    <input type="text" class="form-control" id="celular" name="celular" required>
                </div>

                <!-- formatando número de telefone e celular -->
                <script type="text/javascript">
                $("#telfixo").mask("(00) 0000-0000");
                $("#celular").mask("(00) 00000-0000");
                </script>

                <div class="col"> 
                    <label for="contato">Contato <font color="red">*</font> </label>
                    <input type="text" class="form-control" id="contato" name="contato" required>
                </div>
            </div>

            <!-- endereço -->
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="endereco">Endere&ccedil;o <font color="red">*</font></label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="endereco" name="endereco" required>
                </div>
                <div class="col"> 
                    <label for="numero">N&uacute;mero</label>
                    <input type="text" class="form-control" id="numero" name="numero">
                </div>
                <div class="col"> 
                    <label for="cep">CEP <font color="red">*</font></label>
                    <input type="text" class="form-control" id="cep" name="cep" required>
                </div>

                <!-- formatando CEP -->
                <script type="text/javascript">
                $("#cep").mask("00.000-000");
                </script>

                <div class="col"> 
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" >

                </div>
            </div>
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="complemento">Complemento</label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="complemento" name="complemento">
                </div>
                <div class="col"> 
                    <label for="cidade">Cidade</label>
                    <input name="cidade" class="form-control py-2 border-right-0 border" type="text" id="cidade">
                </div>
                <div class="col"> 
                    <label for="uf">UF</label>
                    <input type="text" class="form-control" id="uf" name="uf">
                </div>
            </div>
            
            <!-- documentos -->
            <div class="row">
                <div class="col"> 
                    <label style="margin-left: 20px;" for="cpfcnpj">CPF/CNPJ<font color="red">*</font></label>
                    <input style="margin-left: 20px;" type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" required>
                </div>
                <div class="col"> 
                    <label for="rginsest">RG/INSC. ESTADUAL<font color="red">*</font></label>
                    <input type="text" class="form-control" id="rginsest" name="rginsest" required>
                </div>
                            
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
                </div>  -->               
            </div>
            <br/>
            <br/>
            <br/>
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

        //Alterar dados do Cliente
        if ($operacao == 'alterar') {
            $cliente = $_GET['clientData'];
            
            //Conexão com o Base de Dados
            include '../core/Database.php';
            $pdo = Database::connect();

            //Selecionar dados do usuário especifico
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT *  FROM clientes_tbl WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cliente));

            echo '<h4 class="text-center"><img src="../img/refresh.png" width="35px" height="35px">Alterar Cliente</h4>
            <br/>
    
            <!--frmClientes ALTERAR DADOS-->
            <form name="frmClientes" action="../classes/operacoesClientes.php" method="post">';
            foreach ($q as $row){
                $dtNasc = date("Y-m-d",strtotime(str_replace('-','/',$row['dtNasc'])));
                echo '<div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="tipo">Tipo</label>
                        <select style="margin-left: 20px;" class="form-control" id="tipo" name="tipo" value="'.$row['tipo'] .'" required>
                            <option>Físico</option>
                            <option>Jurídico</option>
                        </select>
                    </div>
                    <div class="col"> 
                        <label for="nome">Nome Completo<font color="red">*</font></label>
                        <input type="text" class="form-control" id="nome" name="nome" value="'.$row['nome'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="date">Dt. Nascimento</label>
                        <input type="text" class="form-control" id="date" name="dtNasc" value="'.$dtNasc .'">
                    </div>
                </div>
                <!-- contato -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="telfixo">Telefone </label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="telfixo" name="telfixo" value="'.$row['telfixo'] .'">
                    </div>
                    <div class="col"> 
                        <label for="celular">Celular <font color="red">*</font></label>
                        <input type="text" class="form-control" id="celular" name="celular" value="'.$row['celular'] .'" required>
                    </div>

                    <!-- formatando número de telefone e celular -->
                    <script type="text/javascript">
                    $("#telfixo").mask("(00) 0000-0000");
                    $("#celular").mask("(00) 00000-0000");
                    </script>

                    <div class="col"> 
                        <label for="contato">Contato <font color="red">*</font> </label>
                        <input type="text" class="form-control" id="contato" name="contato" value="'.$row['contato'] .'" required>
                    </div>
                </div>

                <!-- endereço -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="endereco">Endere&ccedil;o <font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="endereco" name="endereco" value="'.$row['endereco'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="numero">N&uacute;mero</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="'.$row['numero'] .'">
                    </div>
                    <div class="col"> 
                        <label for="cep">CEP <font color="red">*</font></label>
                        <input type="text" class="form-control" id="cep" name="cep" value="'.$row['cep'] .'" required>
                    </div>

                    <!-- formatando CEP -->
                    <script type="text/javascript">
                    $("#cep").mask("00.000-000");
                    </script>

                    <div class="col"> 
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="'.$row['bairro'] .'">

                    </div>
                </div>
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="complemento">Complemento</label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="complemento" name="complemento" value="'.$row['complemento'] .'">
                    </div>
                    <div class="col"> 
                        <label for="cidade">Cidade</label>
                        <input name="cidade" class="form-control py-2 border-right-0 border" type="text" id="cidade" value="'.$row['cidade'] .'">
                    </div>
                    <div class="col"> 
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" value="'.$row['uf'] .'">
                    </div>
                </div>
            
                <!-- documentos -->
                <div class="row">
                    <div class="col"> 
                        <label style="margin-left: 20px;" for="cpfcnpj">CPF/CNPJ<font color="red">*</font></label>
                        <input style="margin-left: 20px;" type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" value="'.$row['cpfcnpj'] .'" required>
                    </div>
                    <div class="col"> 
                        <label for="rginsest">RG/INSC. ESTADUAL<font color="red">*</font></label>
                        <input type="text" class="form-control" id="rginsest" name="rginsest" value="'.$row['rginsest'] .'" required>
                    </div>
                            
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
                    </div>  -->               
                </div>
                <br/>
                <br/>
                <br/>
                <!-- btns -->
                <br />
                <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <input type="hidden" id="acao" name="acao" value="alterar">
                        <input type="hidden" id="user" name="clientData" value="'.$cliente.'">
                            <a href="#"><button type="submit" class="btn btn-info btn-sm">Alterar </button></a>
                            <a href="../visual/gridCliente.php" class="btn btn-danger btn-sm">Cancelar</a>

                        <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
                    </div>
                </div>
        </form>';
        }
        }
        ?>
    </body>
</html>                            
