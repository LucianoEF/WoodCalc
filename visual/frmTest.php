
<html>
<head>
 <title>Passar Variável Javascript para PHP</title>
 <script type="text/javascript">
  var variaveljs = 'Mauricio Programador'; 
 </script>
</head>
<body>
 <?php 
  $variavelphp = "<script>document.write(variaveljs)</script>";
  echo "Olá $variavelphp";
 ?>

<!-- Retornando o valor de Ym -->
<script type="text/javascript">
                        //Variaveis e js correspondentes as opçoes select do tipo de madeira
                        var ymmacica  = parseInt(document.getElementById('madeiramacica').value, 10);
                        var ymlamelada  = parseInt(document.getElementById('lameladacolada').value, 10);
                        var ymlvl  = parseInt(document.getElementById('lvl').value, 10);
                        var ymcontraplacado  = parseInt(document.getElementById('contraplacado').value, 10);
                        var ymosb  = parseInt(document.getElementById('osb').value, 10);
                            
                        //Abre a função declarada em cada option do select acima.
                        function selecionar(){
                            
                            //Se a opção escolhida for madeira maciça executa este "if"
                            if (document.getElementById('ymmacica').value == "Maciça"){
                                //Abre o php para buscar o valor de ym na tabela coeficienteym_tbl no banco de dados
                                <?php
                                //Inseri o banco de dados
                                include "../core/Database.php"
                                //Função para buscar o valor de "ym" a partir do id correspondente ao tipo de madeira escolhida.
                                //$sql recebe o valor de "ym" e armazena
                                //$sql = "SELECT ym FROM coeficienteym_tbl WHERE tipomadeira = 'madeiramacica'";
                                ?> //Fim do php
                                //Cria uma variavel em js que armazena o valor retirado da tabela do banco de dados
                                //Converte $sql em js.
                                var macica = "<?php echo $sql;?>";
                                //Enviar o valor armazenado em macica no campo readonly correspondente ao id ym.
                                document.getElementById('ym').value = macica;
                            }
                        }   
                    </script> 
</body>
</html>
                           
