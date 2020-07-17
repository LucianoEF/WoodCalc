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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> -->
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
            include '../core/Database.php';
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sqltpmadeira = "SELECT tipomadeira FROM madeira_tbl";
            $sqlespecie = "SELECT especie FROM madeira_tbl";
            $sqltipotelha = "SELECT tipotelha FROM telha_tbl";
            $sqlclasseduracao = "SELECT DISTINCT classeduracao FROM kmod_tbl";
            $sqlclasseserv = "SELECT DISTINCT classeserv FROM kmod_tbl"; //Seleciona uma vez só elementos distintos
            $sqlcliente = "SELECT nome FROM clientes_tbl";
        ?>
        
        <div class="row">
            <div class="col text-center">
                <!-- Título -->
                <h2 class="text-center"><img src="../img/project.png" width="50px" height="50px"> Novo Projeto - Modelo I <img src="../img/modelo1.png" width="150px" height="75px"></h2>
                <br/>
                <br/>

        <!-- Dados Cadastrais -->
        <h3 class="p-1 mb-1 bg-dark text-white">1. Dados cadastrais</h3>
        <br/>

        <form name="dadosCadastrais" action="../classes/resultadoModeloI.php" method="post">
            <div class="row text-center">
                <div class="col"> 
                    <label style="margin-left: 5px;" for="nome">Cliente <font color="red">*</font></label>
                        <select style="margin-left: 5px;" class="form-control" id="nome" name="nome" required>
                            <?php 
                                //echo $sqlcliente = "SELECT nome FROM clientes_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 53
                                foreach ($pdo->query($sqlcliente) as $linha){                       
                                    echo '<option value="'.$linha[nome].'">' .$linha[nome].'</option>';
                                }
                            ?>
                        </select>
                </div>
                <div class="col"> 
                    <label for="name">Nome do Projeto</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col"> 
                    <label for="descricao">Descrição</label>
                    <input type="textarea" class="form-control" id="descricao" name="descricao" >
                </div>
            </div>
            <br/>

        <!-- endereço -->
            <div class="row text-center">
                <div class="col"> 
                    <label style="margin-left: 5px;" for="endereco">Endere&ccedil;o <font color="red">*</font></label>
                    <input style="margin-left: 5px;" type="text" class="form-control" id="endereco" name="endereco" required>
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
            <br/>
            <div class="row text-center">
                <div class="col"> 
                    <label style="margin-left: 5px;" for="complemento">Complemento</label>
                    <input style="margin-left: 5px;" type="text" class="form-control" id="complemento" name="complemento">
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
        <br/>
        <br/>

        <h3 class="p-1 mb-1 bg-dark text-white" >2. Dados da cobertura</h3>
        <br/>
        <br/>
        <div class="row text-center">
            <div class="col"> 
                <label style="margin-left: 5px;" for="largura">Largura (m)<font color="red">*</font></label>
                <input style="margin-left: 5px;" type="number" onchange="calcular()" class="form-control" id="largura" name="largura" required>
            </div>
            <div class="col"> 
                <label for="comprimento">Comprimento (m)<font color="red">*</font></label>
                <input name="comprimento" class="form-control" type="text" id="comprimento" required>
            </div>
            <div class="col"> 
                <label for="inclinacao">Inclinação (%)<font color="red">*</font></label>
                <input type="number" onchange="calcular()" class="form-control" id="inclinacao" name="inclinacao" required>
            </div>
            <div class="col"> 
                <label for="altpendural">Altura do Pendural</label>
                <input readonly="readonly" type="number" class="form-control" id="altpendural" name="altpendural" value="altpendural">
            </div>
        </div>
        <br/>
        <div class="row text-center">
            <div class="col"> 
                <label style="margin-left: 5px;" for="distterca">Distancia entre Terças (m)<font color="red">*</font></label>
                <input style="margin-left: 5px;" type="number" class="form-control" id="distterca" name="distterca" value="distterca" required>
            </div>
            <div class="col"> 
                <label style="margin-left: 5px;" for="disttesoura">Distancia entre Tesouras (m)<font color="red">*</font></label>
                <input style="margin-left: 5px;" type="number" class="form-control" id="disttesoura" name="disttesoura" value="disttesoura" required>
            </div>

            <!--Calculo da altura do Pendural-->
            <script type="text/javascript">
                function calcular(){
                    var largura  = parseInt(document.getElementById('largura').value, 10);
                    var inclinacao  = parseInt(document.getElementById('inclinacao').value, 10);
    
                    if (!isNaN(largura) && !isNaN(inclinacao)){
                    document.getElementById('altpendural').value = ((largura/2) * inclinacao)/100;
                    }
                }   
            </script>           
        </div>
        <br/>

        <div class="row text-center">    
            <div class="col"> 
                <label style="margin-left: 5px;" for="tipomadeira">Tipo de madeira <font color="red">*</font></label>
                <select style="margin-left: 5px;" class="form-control" id="tipomadeira" name="tipomadeira" onchange="kmod()" required>
                        <?php 
                            //echo $sqltpmadeira = "SELECT tipomadeira FROM madeira_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 29
                            foreach ($pdo->query($sqltpmadeira) as $linha){                       

                                echo '<option value="'.$linha[tipomadeira].'">' .$linha[tipomadeira].'</option>';
                                
                            }
                        ?>
                </select>
            </div>
            <div class="col">
                <label>Espécie da madeira <font color="red">*</font></label>
                <select id="espmadeira" class="form-control" name="espmadeira" required>
                    <?php 
                            //echo $sqlespecie = "SELECT tipomadeira FROM madeira_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 30
                            foreach ($pdo->query($sqlespecie) as $linha){                       

                                echo '<option value="'.$linha[especie].'">' .$linha[especie].'</option>';
                                
                            }
                           
                        ?>
                </select>
            </div>
            <div class="col">
                <label for="tipotelha">Tipo de Telha<font color="red">*</font></label>
                <select class="form-control" id="tipotelha" name="tipotelha" required>
                        <?php 
                            //echo $sqltipotelha = "SELECT tipomadeira FROM madeira_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 31
                            foreach ($pdo->query($sqltipotelha) as $linha){                       

                                echo '<option value="'.$linha[tipotelha].'">' .$linha[tipotelha].'</option>';
                                
                            }
                           
                        ?>
                </select>
            </div>
        </div>
        <br/>
        <br/>

        <h3 class="p-1 mb-1 bg-dark text-white" >3. Determinação de classes</h3>
        <br/>
        <br/>

        <!-- Caixa de explicação dos dados -->
        <script>
                $(document).ready(function(){
                $('[data-toggle="popover"]').popover({html: true});   
                });
        </script>

        <div class="row text-center">
            <div class="col"> 
                <label for="classeduracao">
                    <div class="container">
                        <ul class="list-inline">
                            <li>
                            <a type="button" style="margin-left: 5px;" class="btn btn-primary btn-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Permanente = mais de 10 anos;<br>Longo Prazo = 6 meses a 10 anos;<br>Médio Prazo = 1 semana a 6 meses;<br>Curto Prazo = menos de 1 semana;<br>Instantânea."></a>
                            Classe de Duração das Ações
                            </li>
                        </ul>
                    </div>
                <font color="red">*</font></label>
                <select style="margin-left: 5px;" onchange="kmod()" class="form-control" id="classeduracao" name="classeduracao" required>
                        <?php 
                            //echo $sqlclasseduracao = "SELECT tipomadeira FROM madeira_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 31
                            foreach ($pdo->query($sqlclasseduracao) as $linha){                       

                                echo '<option value="'.$linha[classeduracao].'">' .$linha[classeduracao].'</option>';
                                
                            }
                           
                        ?>
                </select>
            </div>
            <div class="col"> 
                <label for="classeserv">
                <div class="container">
                    <ul class="list-inline">
                        <li>
                        <a type="button" class="btn btn-primary btn-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Classe 1 - Ambiente interior protegido;<br>Classe 2 – Ambiente interior não protegido ou exterior não sujeito à ação direta da água das chuvas e com contato muito esporádico com água líquida;<br>Classe 3 – Ambiente exterior com contatos frequentes com água das chuvas, muitas vezes em períodos longos."></a>
                        Classe de Serviço
                        </li>
                    </ul>
                </div>
                <font color="red">*</font></label>
                <select class="form-control" onchange="kmod()" id="classeservi" name="classeserv" required>
                        <?php 
                            //echo $sqlclasseserv = "SELECT tipomadeira FROM madeira_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 31
                            foreach ($pdo->query($sqlclasseserv) as $linha){                       

                                echo '<option value="'.$linha[classeserv].'">' .$linha[classeserv].'</option>';
                                
                            }
                           
                        ?>
                </select>
            </div>
        </div>
        <br/>
        <br/>

        <h3 class="p-1 mb-1 bg-dark text-white">4. Terça</h3>
        <br/>

        <div class="row text-center">
            <div class="col">
                <label style="margin-left: 20px;" for="secaoterca"><h5>Seção da Terça</h5></label>
                <label style="margin-left: 20px;" for="baseterca">Base (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="baseterca" name="baseterca" required></label>
                <label style="margin-left: 20px;" for="altterca">Altura (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="altterca" name="altterca" required></label>
            </div>
        </div>
        <br/>
        <br/>

        <h3 class="p-1 mb-1 bg-dark text-white">5. Tesoura</h3>
        <br/>

        <h4 class="p-1 mb-1 bg-dark text-white">5.1 Banzo Superior</h4>
        <br/>
        <div class="row text-center">
            <div class="col">
                <label style="margin-left: 20px;" for="secaobs"><h5>Seção Banzo Superior</h5></label>
                <label style="margin-left: 20px;" for="basebs">Base (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="basebs" name="basebs" required></label>
                <label style="margin-left: 20px;" for="altbs">Altura (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="altbs" name="altbs" required></label>
            </div>
        </div>
        <br/>
        <br/>

        <h4 class="p-1 mb-1 bg-dark text-white">5.2 Banzo Inferior</h4>
        <br/>
        <div class="row text-center">
            <div class="col">
                <label style="margin-left: 20px;" for="secaobi"><h5>Seção Banzo Inferior</h5></label>
                <label style="margin-left: 20px;" for="basebi">Base (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="basebi" name="basebi" required></label>
                <label style="margin-left: 20px;" for="altbi">Altura (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="altbi" name="altbi" required></label>
            </div>
        </div>
        <br/>
        <br/>

        <h4 class="p-1 mb-1 bg-dark text-white">5.3 Pendural</h4>
        <br/>
        <div class="row text-center">
            <div class="col">
                <label style="margin-left: 20px;" for="secaope"><h5>Seção Pendural</h5></label>
                <label style="margin-left: 20px;" for="basepe">Base (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="basepe" name="basepe" required></label>
                <label style="margin-left: 20px;" for="altpe">Altura (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="altpe" name="altpe" required></label>
            </div>
        </div>
        <br/>
        <br/>

        <h4 class="p-1 mb-1 bg-dark text-white">5.4 Pontaletes</h4>
        <br/>
        <div class="row text-center">
            <div class="col">
                <label style="margin-left: 20px;" for="secaopo"><h5>Seção Pontaletes</h5></label>
                <label style="margin-left: 20px;" for="basepo">Base (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="basepo" name="basepo" required></label>
                <label style="margin-left: 20px;" for="altpo">Altura (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="altpo" name="altpo" required></label>
            </div>
        </div>
        <br/>
        <br/>

        <h4 class="p-1 mb-1 bg-dark text-white">5.5 Escoras</h4>
        <br/>
        <div class="row text-center">
            <div class="col">
                <label style="margin-left: 20px;" for="secaoes"><h5>Seção Escoras</h5></label>
                <label style="margin-left: 20px;" for="basees">Base (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="basees" name="basees" required></label>
                <label style="margin-left: 20px;" for="altes">Altura (m)<font color="red">*</font><input style="margin-left: 20px;" type="text" class="form-control" id="altes" name="altes" required></label>
            </div>
        </div>
        <br/>
        <br />

            <div class="container">
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-info btn-sm">Calcular </button>
                    <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                </div>
            </div>
            <br/>
        </form>
    </body>
</html>                            
