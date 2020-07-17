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
            include "../visual/menu.html";

            $largura = $_POST['largura'];
            $altpendural = $_POST['altpendural'];
            $distterca = $_POST['distterca'];
            $disttesoura = $_POST['disttesoura'];
            $espmadeira = $_POST['espmadeira'];
            $tipotelha = $_POST['tipotelha'];
            $baseterca = $_POST['baseterca'];
            $altterca = $_POST['altterca'];
            $basebs = $_POST['basebs'];
            $altbs = $_POST['altbs'];
            $basebi = $_POST['basebi'];
            $altbi = $_POST['altbi'];
            $basepe = $_POST['basepe'];
            $altpe = $_POST['altpe'];
            $basepo = $_POST['basepo'];
            $altpo = $_POST['altpo'];
            $basees = $_POST['basees'];
            $altes = $_POST['altes'];
            $tipomadeira = $_POST['tipomadeira'];
            $tipotelha = $_POST['tipotelha'];
            $classeduracao = $_POST['classeduracao'];
            $classeserv = $_POST['classeserv'];
            $altpendural = $_POST['altpendural'];

            //calculo do kmod
            include '../core/Database.php';
                $pdo = Database::connect();
                //SHOW COLUMNS FROM tbl
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Trazendo o valor de kmod do banco de dados
                $sqlkmod = "SELECT kmod FROM kmod_tbl WHERE tipomadeira = '$tipomadeira' and classeserv = '$classeserv' and classeduracao = '$classeduracao'";
                
                foreach ($pdo->query($sqlkmod) as $kdc){
                    $kmoddadoscobertura = $kdc['kmod'];
                }   
                
                //Trazendo o valor de ym do banco de dados
                $sqlym = "SELECT ym FROM coeficienteym_tbl WHERE tipomadeira = '$tipomadeira'";
                
                foreach ($pdo->query($sqlym) as $ym){
                    $ymdadoscobertura = $ym['ym'];
                }
                
                /* descomente o trecho abaixo para saber se está retornando os valores corretamente
                echo  $kmoddadoscobertura. "<br>";
                echo  $ymdadoscobertura. "<br>";
                echo  $largura. "<br>";
                echo  $altpendural. "<br>";
                echo  $distterca. "<br>";
                echo  $disttesoura. "<br>";
                echo  $espmadeira. "<br>";
                echo  $tipotelha. "<br>";
                echo  $baseterca. "<br>";
                echo  $altterca. "<br>";
                echo  $basebs. "<br>";
                echo  $altbs. "<br>";
                echo  $basebi. "<br>";
                echo  $altbi. "<br>";
                echo  $basepe. "<br>";
                echo  $altpe. "<br>";
                echo  $basepo. "<br>";
                echo  $altpo. "<br>";
                echo  $basees. "<br>";
                echo  $altes. "<br>"; */

                //Trazendo o peso próprio da telha do banco de dados
                $sqlpesoproprio = "SELECT pesoproprio FROM telha_tbl WHERE tipotelha = '$tipotelha'";
                
                foreach ($pdo->query($sqlpesoproprio) as $pptelha){
                    $pesopropriotelha = $pptelha['pesoproprio'];
                }
                // echo  $pesopropriotelha. "<br>";

                //Trazendo as propriedades mecanicas da madeira do banco de dados
                $sqlpropmecanicas = "SELECT rbas, ec0, fc0, ft0, ft90 FROM madeira_tbl WHERE tipomadeira = '$tipomadeira' and especie = '$espmadeira'";
                
                foreach ($pdo->query($sqlpropmecanicas) as $sqll){
                    $pap = $sqll['rbas'];
                    $ec0k = $sqll['ec0'];
                    $fc0k = $sqll['fc0'];
                    $ft0k = $sqll['ft0'];
                    $ft90k = $sqll['ft90'];
                }
                /* echo  $pap. "<br>";
                echo  $ec0k. "<br>";
                echo  $fc0k. "<br>";
                echo  $ft0k. "<br>";
                echo  $ft90k. "<br>"; */

                //cálculo de fcod
                $fcod = $kmoddadoscobertura * ($fc0k/$ymdadoscobertura);
                //echo $fcod. "<br>";

                //cálculo de Ecof
                $ecof = $kmoddadoscobertura * $ec0k;
                //echo $ecof. "<br>";

                //cálculo do Peso Próprio da terça
                $ppterca = $baseterca * $altterca * $pap;
                //echo $ppterca. "<br>";

                //cálculo do Peso Próprio da telha
                $pesotelha = $pesopropriotelha * $distterca;
                //echo $pesotelha. "<br>";

                //cálculo de Sobrecarga
                $sobrecarga = 25 * $distterca;
                //echo $sobrecarga. "<br>";

                //cálculo de Fr
                $fr = (($ppterca + $pesotelha) * $ymdadoscobertura) + ($sobrecarga * $ymdadoscobertura);
                $fr = round($fr, 3);
                //echo $fr. "<br>";

                //cálculo de hipotenusa da tesoura
                $hip = sqrt(pow($altpendural, 2) + pow(($largura/2), 2));
                $hip = round($hip, 3);
                //echo $hip. "<br>";

                //cálculo de sen0
                $sen0 = ($altpendural / $hip);
                $sen0 = round($sen0, 3);
                //echo $sen0. "<br>";

                //cálculo de cos0
                $cos0 = (($largura/2) / $hip);
                $cos0 = round($cos0, 3);
                //echo $cos0. "<br>";

                //cálculo de Fy
                $fy = ($fr * $cos0);
                $fy = round($fy, 3);
                //echo $fy. "<br>";

                //cálculo de Fx
                $fx = ($fr * $sen0);
                $fx = round($fx, 3);
                //echo $fx. "<br>";

                //Tensão Normal Máxmimas
                    //Cálculos dos momentos máximos em 'x' e 'y'.
                    //Cálculo de Mxmax - momento máximo em 'x'.
                    $mxmax = ($fy * (pow($disttesoura, 2))/8);
                    //echo $mxmax. "<br>";

                    //Cálculo de Mymax - momento máximo em 'y'.
                    $mymax = round(($fx * (pow($disttesoura, 2))/8), 3);
                    //echo $mymax. "<br>";

    ?>      
            <h3 class="p-1 mb-1 bg-dark text-white text-center">1. Verificações da Terça</h3>
            <br/>
            <div class="row text-center">
                <div class="col">
    <?php
                    //Cálculos das Tensões máximas em 'x' e 'y'.
                    //Cálculo de Tmxmax - Tensão máxima em 'x'.
                    $tmxmax = round($mxmax / (($baseterca * (pow($altterca, 2))) / 6), 3);
                    ?><label ><h5>Tensão Máxima em 'x'</h5></label>
                        <br/>
                        <div  ><?php echo $tmxmax. " Kgf/m²<br>";?></div><?php
    ?>
                <br/>
                </div>
                <div class="col">
    <?php
                    //Cálculo de Tmymax - Tensão máxima em 'y'.
                    $tmymax = round($mymax / (($altterca * (pow($baseterca, 2))) / 6), 3);
                    //$tmymax = number_format($tmymax, 3);
                    ?><label ><h5>Tensão Máxima em 'y'</h5></label>
                        <br/>
                        <div  ><?php echo $tmymax. " Kgf/m²<br>";?></div><?php
                //Fim do cálculo de Tensão Normal
    ?>
                </div>
            </div>
            <br/>
            <div class="row text-center">
                <div class="col">
    <?php

                
                //Verificação quanto à flexão Oblíqua
                    //Condição I
                    $cond1 = round(( (($tmxmax / 10000) / ($fcod * 10)) + (0.7 * (($tmymax / 10000) / ($fcod * 10)))), 3);
                    if ($cond1 < 1){
                        ?><label ><h5>Flexão Oblíqua - Condição I</h5></label>
                        <br/>
                        <div  ><?php echo number_format($cond1, 3)." &le; 1 (atende)<br>";?></div><?php

                        if (0.7 < $cond1){
                            ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                        }

                        if ((0.4 <= $cond1) && ($cond1 <= 0.7)){
                            ?><br/><label ><h6 class="text-warning">*Cuidado sua terça pode estar superdimensionada</h6></label><?php
                        }

                        if ($cond1 < 0.4){
                            ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção da terça.</h6></label><?php
                        }
                    }
                    if ($cond1 > 1){
                        ?><label ><h5>Flexão Oblíqua - Condição I</h5></label>
                        <br/>
                        <div  ><?php echo number_format($cond1, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - tente aumentar a seção da terça.</h6></label><?php
                    }

    ?>
                <br/>
                </div>
                <div class="col">
    <?php

                    //Condição II
                    $cond2 = round(( (0.7 * (($tmxmax / 10000) / ($fcod * 10))) + (($tmymax / 10000) / ($fcod * 10))), 3);
                    if ($cond2 < 1){
                        ?><label ><h5>Flexão Oblíqua - Condição II</h5></label>
                        <br/>
                        <div  ><?php echo number_format($cond2, 3). " &le; 1 (atende)<br>";?></div><?php

                        if (0.7 < $cond2){
                            ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                        }

                        if ((0.4 <= $cond2) && ($cond2 <= 0.7)){
                            ?><br/><label ><h6 class="text-warning">*Cuidado sua terça pode estar superdimensionada</h6></label><?php
                        }

                        if ($cond2 < 0.4){
                            ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção da terça.</h6></label><?php
                        }
                    }
                    if ($cond2 > 1){
                        ?><label ><h5>Flexão Oblíqua - Condição II</h5></label>
                        <br/>
                        <div  ><?php echo number_format($cond2, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - tente aumentar a seção da terça.</h6></label><?php
                    }
                //Fim das verificações da Terça
    ?>
                </div>
                </div>
            </div>
            <br/>
            <br/>
    <?php

                //Verificação das tesouras.
                //Determinação das Forças axiais resultante nos nós da tesoura.
                //Força "P".
                $p = $fy * $disttesoura;
                //echo $p. "<br>";

                //Força "P" aplicada na extremidade da tesoura com beiral de 80cm.
                $pbeiral = round((($p/2) + (($p/$distterca) * 0.8)), 3);
                //echo $pbeiral. "<br>";

                //Cálculo da reação de apoio.
                //Analisado por simetria.
                $rapoio = round(($pbeiral + (2.5 * $p)), 3);
                //echo $rapoio. "<br>";

                //cálculo de hipotenusa da escora
                $hipes = sqrt(pow(($altpendural * (2 / 3)), 2) + pow(($largura/6), 2));
                $hipes = round($hipes, 3);
                //echo $hipes. "<br>";

                //cálculo de senx
                $senx = round((($altpendural * (2 / 3)) / $hipes), 3);
                //echo $senx. "<br>";

                //cálculo de cosx
                $cosx = round((($largura/6) / $hipes), 3);
                //echo $cosx. "<br>";

                //cálculo de senb
                $senb = $cosx;
                //echo $senb. "<br>";

                //cálculo de cosb
                $cosb = $senx;
                //echo $cosb. "<br>";

                //Método dos Nós.
                    //Nó A.
                        //Barra 'AB'.
                        $ab = round((($pbeiral - $rapoio) / $sen0), 3);
                            //Imprimi Compressão caso o resultado 'ab' seja negativo.
                            if ($ab < 1){
                                //echo number_format(-$ab, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'ab' seja positivo.
                            if ($ab > 1){
                                //echo number_format($ab, 3). " &ge; 1 (Tração)<br>";
                            }

                        //Barra 'A'.
                        $ac = round((-$ab * $cos0), 3);
                            //Imprimi Compressão caso o resultado 'ac' seja negativo.
                            if ($ac < 1){
                                //echo number_format(-$ac, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'ac' seja positivo.
                            if ($ac > 1){
                                //echo number_format($ac, 3). " &ge; 1 (Tração)<br>";
                            }
                    //Fim do Nó A.

                    //Nó B.
                    //cálculo de seny
                    $seny = $cos0;
                    //echo $seny. "<br>";

                    //cálculo de cosy
                    $cosy = $sen0;
                    //echo $cosy. "<br>";

                        //Barra 'CD'.
                        $be = round((-$p / (2 * $cosy)), 3);
                            //Imprimi Compressão caso o resultado 'be' seja negativo.
                            if ($be < 1){
                                //echo number_format(-$be, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'be' seja positivo.
                            if ($be > 1){
                                //echo number_format($be, 3). " &ge; 1 (Tração)<br>";
                            }

                        //Barra 'BD'.
                        //cálculo de novo angulo
                        $cos02 = round((((2* ($hip/3)* ($hip/3)) - ($altpendural * (2 / 3))) / (2 * ($hip/3)* ($hip/3))), 3);
                        //echo $cos02. "<br>";

                        $bd = round(($ab + ($p * $cosy) - ($be * $cos02)), 3);
                            //Imprimi Compressão caso o resultado 'bd' seja negativo.
                            if ($bd < 1){
                                //echo number_format(-$bd, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'bd' seja positivo.
                            if ($bd > 1){
                                //echo number_format($bd, 3). " &ge; 1 (Tração)<br>";
                            }

                    //Nó C.
                        //Barra 'CE'.
                        $ce = $ac;
                            //Imprimi Compressão caso o resultado 'ce' seja negativo.
                            if ($ce < 1){
                                //echo number_format(-$ce, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'ce' seja positivo.
                            if ($ce > 1){
                                //echo number_format($ce, 3). " &ge; 1 (Tração)<br>";
                            }

                    //Nó E.
                        //Barra 'EG'.
                        $eg = round(($ce + ($be * $cos0)), 3);
                            //Imprimi Compressão caso o resultado 'eg' seja negativo.
                            if ($eg < 1){
                                //echo number_format(-$eg, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'eg' seja positivo.
                            if ($eg > 1){
                                //echo number_format($eg, 3). " &ge; 1 (Tração)<br>";
                            }

                        //Barra 'ED'.
                        $ed = round((-$be * $sen0), 3);
                            //Imprimi Compressão caso o resultado 'eg' seja negativo.
                            if ($ed < 1){
                                //echo number_format(-$ed, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'ed' seja positivo.
                            if ($ed > 1){
                                //echo number_format($ed, 3). " &ge; 1 (Tração)<br>";
                            }

                    //Nó D.
                        //Barra 'DF'.
                        $df = round(((($bd * $seny) + (((($bd * $cosy) + $ed + $p) / $senx) * $cosx)) / ($cos0 + (($sen0 * $cosx) / $senx))), 3);
                            //Imprimi Compressão caso o resultado 'eg' seja negativo.
                            if ($df < 1){
                                //echo number_format(-$df, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'df' seja positivo.
                            if ($df > 1){
                                //echo number_format($df, 3). " &ge; 1 (Tração)<br>";
                            }
                        
                        //Barra 'DG'.
                        $dg = round(((($bd * $seny) - ($df * $cos0)) / $cosx), 3);
                            //Imprimi Compressão caso o resultado 'dg' seja negativo.
                            if ($dg < 1){
                                //echo number_format(-$dg, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'dg' seja positivo.
                            if ($dg > 1){
                                //echo number_format($dg, 3). " &ge; 1 (Tração)<br>";
                            }
                    //Fim do Nó D.

                    //Nó G.
                        //Barra 'GF'.
                        $gf = round((2 * -$dg * $senx), 3);
                            //Imprimi Compressão caso o resultado 'eg' seja negativo.
                            if ($gf < 1){
                                //echo number_format(-$gf, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'gf' seja positivo.
                            if ($gf > 1){
                                //echo number_format($gf, 3). " &ge; 1 (Tração)<br>";
                            }

                        //Barra 'FG'.
                        //Prova real de GF.
                        $fg = round((- $p + (2 * - $df * $sen0)), 3);
                            //Imprimi Compressão caso o resultado 'eg' seja negativo.
                            if ($fg < 1){
                                //echo number_format(-$fg, 3). " &le; 1 (Compressão)<br>";
                            }
                            //Imprimi Tração caso o resultado 'fg' seja positivo.
                            if ($fg > 1){
                                //echo number_format($fg, 3). " &ge; 1 (Tração)<br>";
                            }
                    //Fim nó G.
                //Fim do Método dos nós.

                ?>
            <h3 class="p-1 mb-1 bg-dark text-white text-center">2. Verificações da Tesoura</h3>
            <br/>     
            <h4 class="p-1 mb-1 bg-dark text-white text-center">2.1. Verificações do Banzo Superior</h4>
            <br/>
            <div class="row text-center">
                <div class="col">
    <?php
                    //Verificação do Banzo Superior.
                    //Verifica a maior força do Banzo Superior a se considerar nas verificações.
                    $nbs = min($ab, $bd, $df);
                    ?><label ><h5>Maior Normal Aplicada</h5></label>
                        <br/>
                        <div ><?php echo -$nbs. " Kgf   (Compressão)";?></div>
                </div>
                <br/>
                <?php

                    //Cálculo da Tensão Normal no Banzo Superior.
                    $tntbs = round(($nbs / ($basebs * $altbs)), 3);
                        //Imprimi Compressão caso o resultado 'tntbs' seja negativo.
                        if ($tntbs < 1){
                            ?>
                <div class="col">
                            <label><h5>Tensão no Banzo</h5></label>
                        <br/>
                        <div ><?php echo number_format(-$tntbs, 3). " Kgf/m²  (Compressão)";?></div>
                </div><?php
                        }
                    ?>
                <br/>
                    <?php
                        //Imprimi Tração caso o resultado 'tntbs' seja positivo.
                        if ($tntbs > 1){
                            ?>
                <div class="col">
                            <label><h5>Tensão no Banzo</h5></label>
                            <br/>
                            <div ><?php echo number_format($tntbs, 3). " (Tração)";?></div>
                </div><?php
                        }
                    ?>
            </div>
            <br/>
            <br/>

            <div class="row text-center">
                <?php

                    //Verificação quanto à flexão
                    $condbs = round(((-$tntbs / 10000) / ($fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntbs' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condbs < 1){
                            ?>
                <div class="col">
                            <label><h5>Flexocompressão - Condição</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbs, 3). " &le; 1 (Atende)";?></div><?php

                        if (0.7 < $condbs){
                            ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                        }

                        if ((0.4 <= $condbs) && ($condbs <= 0.7)){
                            ?><br/><label ><h6 class="text-warning">*Cuidado seu banzo pode estar superdimensionado</h6></label><?php
                        }

                        if ($condbs < 0.4){
                            ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção do banzo.</h6></label><?php
                        }?>
                </div><?php
                        }
                        //Imprimi Não atende caso o resultado 'tntbs' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condbs > 1){
                            ?>
                <div class="col">
                            <label><h5>Flexotração - Condição</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbs, 3). " &ge; 1 (Não atende)";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - tente aumentar a seção do banzo.</h6></label>
                </div><?php
                        }
                    ?>
            </div>
            <br/><?php
                //Fim da Verificação.

                //Verificação quanto à esbeltez
                    //cálculo de distancia l0x.
                    $l0x = sqrt(pow(($altpendural / 3), 2) + pow(($largura/6), 2));
                    //cálculo de lambdax.
                    $lambdax = round((($l0x * sqrt(12)) / $altbs), 3);
                    //echo $lambdax. "<br>";
                    //cálculo de lambda,relx    
                    $lambdarelx = round(($lambdax / 3.14) * sqrt(($fc0k / $ecof)), 3);
                    //echo $lambdarelx. "<br>";
                    //cálculo de kx    
                    $kx = round((0.5 * (1 + (0.2* ($lambdarelx - 0.3) + pow($lambdarelx, 2)))), 3);
                    //echo $kx. "<br>";
                    //cálculo de kcx    
                    $kcx = round((1 / ($kx + sqrt(pow($kx, 2) - pow($lambdarelx, 2)))), 3);
                    //echo $kcx. " valor a guardar<br> ";

                    //cálculo de distancia l0y.
                    $l0y = sqrt(pow(($altpendural / 3), 2) + pow(($largura/6), 2));
                    //cálculo de lambdaybs.
                    $lambdaybs = round((($l0y * sqrt(12)) / $basebs), 3);
                    //echo $lambdaybs. "<br>";
                    //cálculo de lambda,rely    
                    $lambdarelybs = round(($lambdaybs / 3.14) * sqrt(($fc0k / $ecof)), 3);
                    //echo $lambdarelybs. "<br>";
                    //cálculo de ky    
                    $ky = round((0.5 * (1 + (0.2* ($lambdarelybs - 0.3) + pow($lambdarelybs, 2)))), 3);
                    //echo $ky. "<br>";
                    //cálculo de kcy    
                    $kcy = round((1 / ($ky + sqrt(pow($ky, 2) - pow($lambdarelybs, 2)))), 3);
                    //echo $kcy. "<br>";

            ?><div class="row text-center"><?php
                    //Cálculo da Tensão Normal no Banzo Superior com os coeficientes kcx e kcy.
                        $condbskcx = round(((-$tntbs / 10000) / ($kcx * $fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntbs' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condbskcx < 1){
                            ?>
                <div class="col">
                            <label><h5>Esbeltez - Condição I</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbskcx, 3). " &le; 1 (Atende)";?></div><?php

                            if (0.7 < $condbskcx){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condbskcx) && ($condbskcx <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado seu banzo pode estar superdimensionado</h6></label><?php
                            }

                            if ($condbskcx < 0.4){
                                ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção do banzo.</h6></label><?php
                            }?>
                </div><?php
                        }
                        //Imprimi Não atende caso o resultado 'tntbs' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condbskcx > 1){
                            ?>
                <div class="col">
                            <label><h5>Esbeltez - Condição I</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbskcx, 3). " &ge; 1 (Não atende)";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - tente aumentar a seção do banzo.</h6></label>
                </div><?php
                        }

                        $condbskcy = round(((-$tntbs / 10000) / ($kcy * $fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntbs' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condbskcy < 1){
                            ?>
                <div class="col">
                            <label><h5>Esbeltez - Condição II</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbskcy, 3). " &le; 1 (Atende)";?></div><?php

                            if (0.7 < $condbskcy){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condbskcy) && ($condbskcy <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado seu banzo pode estar superdimensionado</h6></label><?php
                            }

                            if ($condbskcy < 0.4){
                                ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção do banzo.</h6></label><?php
                            }?>
                </div><?php
                        }
                        //Imprimi Não atende caso o resultado 'tntbs' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condbskcy > 1){
                            ?>
                <div class="col">
                            <label><h5>Esbeltez - Condição II</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbskcy, 3). " &ge; 1 (Não atende)";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - tente aumentar a seção do banzo.</h6></label>
                </div><?php
                        }
                    ?>
            </div><br/><?php
                //Fim da Verificação quanto à esbeltez
                //Fim da Verificação do Banzo Superior.

            ?>
                <h4 class="p-1 mb-1 bg-dark text-white text-center">2.2. Verificações do Banzo Inferior</h4>
                <br/>
            <div class="row text-center">
                <div class="col">
            <?php

                //Verificação do Banzo Inferior.
                //Verifica a maior força do Banzo Inferior a se considerar nas verificações.
                $nbi = max($ac, $ce, $eg);
                ?><label ><h5>Maior Normal Aplicada</h5></label>
                        <br/>
                        <div ><?php echo $nbi. " Kgf (Tração)<br>";?></div>
                </div>
                <br/>
                <?php

                //Cálculo da Tensão Normal no Banzo Inferior.
                $tntbi = round(($nbi / ($basebi * $altbi)), 3);
                        //Imprimi Compressão caso o resultado 'tntbi' seja negativo.
                        if ($tntbi < 1){
            ?>
                <div class="col">
                <label ><h5>Tensão do Banzo</h5></label>
                        <br/>
                        <div ><?php echo number_format(-$tntbi, 3). " Kgf/m² (Compressão)<br>";?></div>
                </div>
                <br/>
            <?php
                        }
                        //Imprimi Tração caso o resultado 'tntbi' seja positivo.
                        if ($tntbi > 1){
            ?>
                <div class="col">
                <label ><h5>Tensão do Banzo</h5></label>
                        <br/>
                        <div ><?php echo number_format($tntbi, 3). " Kgf/m² (Tração)<br>";?></div>
                </div>
                <br/>
            <?php
                        }
            ?>
            </div>
            <br/>
            <div class="row text-center">
            <?php

                //Verificação quanto à flexão
                $condbi = round((($tntbi / 10000) / ($fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntbi' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condbi < 1){
            ?>
                <div class="col">
                <label ><h5>Flexotração - Condição</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbi, 3). " &le; 1 (Atende)<br>";?></div><?php

                            if (0.7 < $condbskcy){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condbskcy) && ($condbskcy <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado seu banzo pode estar superdimensionado</h6></label><?php
                            }

                            if ($condbskcy < 0.4){
                                ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção do banzo.</h6></label><?php
                            }?>
                        
                </div>
                <br/>
            <?php
                        }
                        //Imprimi Não atende caso o resultado 'tntbi' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condbi > 1){
            ?>
                <div class="col">
                <label ><h5>Flexotração - Condição</h5></label>
                        <br/>
                        <div ><?php echo number_format($condbi, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - aumente a seção do banzo.</h6></label>
                </div>
                <br/>
            <?php
                        }
            ?>
            <br/>
            </div>
            <br/>
            <?php
                //Fim da Verificação.
                //Fim da Verificação do Banzo Inferior.

        ?>
                <h4 class="p-1 mb-1 bg-dark text-white text-center">2.3. Verificações das Escoras</h4>
                <br/>
            <div class="row text-center">
                <div class="col">
        <?php

                //Verificação do Escoras.
                //Verifica a maior força do Escoras a se considerar nas verificações.
                $nes = min($be, $dg);
                ?><label ><h5>Maior Normal Aplicada</h5></label>
                        <br/>
                        <div ><?php echo -$nes. " Kgf (Compressão)<br>";?></div>
                </div>
                <br/>
                <?php

                //Cálculo da Tensão Normal no Escoras.
                $tntes = round(($nes / ($basees * $altes)), 3);
                        //Imprimi Compressão caso o resultado 'tntes' seja negativo.
                        if ($tntes < 1){
        ?> 
                <div class="col">
                <label ><h5>Tensão na Escora</h5></label>
                        <br/>
                        <div ><?php echo number_format(-$tntes, 3). " Kgf/m² (Compressão)<br>";?></div>
                </div>
                <br/>
                <?php
                        }
                        //Imprimi Tração caso o resultado 'tntes' seja positivo.
                        if ($tntes > 1){
        ?> 
                <div class="col">
                <label ><h5>Tensão na Escora</h5></label>
                        <br/>
                        <div ><?php echo number_format($tntes, 3). " (Tração)<br>";?></div>
                </div>
                <br/>
                <?php
                        }

        ?>
            </div>
            <br/>
            <div class="row text-center">
        <?php

                //Verificação quanto à flexão
                $condes = round(((-$tntes / 10000) / ($fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntes' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condes < 1){
        ?> 
                <div class="col">
                <label ><h5>Flexocompressão</h5></label>
                        <br/>
                        <div ><?php echo number_format($condes, 3). " &le; 1 (Atende)<br>";?></div><?php

                            if (0.7 < $condes){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condes) && ($condes <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado sua escora pode estar superdimensionado</h6></label><?php
                            }

                            if ($condes < 0.4){
                                ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção da escora.</h6></label><?php
                            }?>
                </div>
                <br/>
        <?php
                        }
                        //Imprimi Não atende caso o resultado 'tntes' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condes > 1){
        ?> 
                <div class="col">
                <label ><h5>Flexocompressão</h5></label>
                        <br/>
                        <div ><?php echo number_format($condes, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - aumente a seção da escora.</h6></label>
                </div>
                <br/>
        <?php
                        }
                //Fim da Verificação.

                //Verificação quanto à esbeltez
                    //cálculo de distancia l0esx.
                    $l0esx = round(sqrt(pow((($altpendural * 2) / 3), 2) + pow($largura/6, 2)), 3);
                    //echo $l0esx. "<br>";
                    //cálculo de lambdaesx.
                    $lambdaesx = round((($l0esx * sqrt(12)) / $altes), 3);
                    //echo $lambdaesx. "<br>";
                    //cálculo de lambdaesrelx    
                    $lambdaesrelx = round(($lambdaesx / 3.14) * sqrt(($fc0k / $ecof)), 3);
                    //echo $lambdaesrelx. "<br>";
                    //cálculo de kxes    
                    $kxes = round((0.5 * (1 + (0.2* ($lambdaesrelx - 0.3) + pow($lambdaesrelx, 2)))), 3);
                    //echo $kxes. "<br>";
                    //cálculo de kcxes    
                    $kcxes = round((1 / ($kxes + sqrt(pow($kxes, 2) - pow($lambdaesrelx, 2)))), 3);
                    //echo $kcxes;

                    //cálculo de distancia l0esy.
                    $l0esy = $l0esx;
                    //cálculo de lambdaesy.
                    $lambdaesy = round((($l0esy * sqrt(12)) / $basees), 3);
                    //echo $lambdaesy. "<br>";
                    //cálculo de lambdaesrely    
                    $lambdaesrely = round(($lambdaesy / 3.14) * sqrt(($fc0k / $ecof)), 3);
                    //echo $lambdaesrely. "<br>";
                    //cálculo de kyes    
                    $kyes = round((0.5 * (1 + (0.2* ($lambdaesrely - 0.3) + pow($lambdaesrely, 2)))), 3);
                    //echo $kyes. "<br>";
                    //cálculo de kcyes    
                    $kcyes = round((1 / ($kyes + sqrt(pow($kyes, 2) - pow($lambdaesrely, 2)))), 3);
                    //echo $kcyes. "<br>";

                    //Cálculo da Tensão Normal no Escoras com os coeficientes kcxes e kcyes.
                        $condeskcx = round(((-$tntes / 10000) / ($kcxes * $fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntes' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
        ?>
            </div>
            <br/>
            <div class="row text-center">
        <?php
                        if ($condeskcx < 1){
        ?> 
                <div class="col">
                <label ><h5>Esbeltez - Condição I</h5></label>
                        <br/>
                        <div ><?php echo number_format($condeskcx, 3). " &le; 1 (Atende)<br>";?></div><?php

                            if (0.7 < $condeskcx){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condeskcx) && ($condeskcx <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado sua escora pode estar superdimensionado</h6></label><?php
                            }

                            if ($condeskcx < 0.4){
                                ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção da escora.</h6></label><?php
                            }?>
                </div>
                <br/>
        <?php
                        }
                        //Imprimi Não atende caso o resultado 'tntes' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condeskcx > 1){
        ?> 
                <div class="col">
                <label ><h5>Esbeltez - Condição I</h5></label>
                        <br/>
                        <div ><?php echo number_format($condeskcx, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - aumente a seção da escora.</h6></label>
                </div>
                <br/>
        <?php
                        }

                        $condeskcy = round(((-$tntes / 10000) / ($kcyes * $fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntes' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condeskcy < 1){
        ?> 
                <div class="col">
                <label ><h5>Esbeltez - Condição II</h5></label>
                        <br/>
                        <div ><?php echo number_format($condeskcy, 3). " &le; 1 (Atende)<br>";?></div><?php

                            if (0.7 < $condeskcy){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condeskcy) && ($condeskcy <= 0.7)){
                            ?><br/><label ><h6 class="text-warning">*Cuidado sua escora pode estar superdimensionado</h6></label><?php
                            }

                            if ($condeskcy < 0.4){
                            ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção da escora.</h6></label><?php
                            }?>
                </div>
                <br/>
        <?php
                        }
                        //Imprimi Não atende caso o resultado 'tntes' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condeskcy > 1){
        ?> 
                <div class="col">
                <label ><h5>Esbeltez - Condição II</h5></label>
                        <br/>
                        <div ><?php echo number_format($condeskcy, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - aumente a seção da escora.</h6></label>
                </div>
                <br/>
        <?php
                        }
        ?>
        <br/>
        </div><br/><?php
                //Fim da Verificação quanto à esbeltez
                //Fim da Verificação do Escoras.

        ?>
                <h4 class="p-1 mb-1 bg-dark text-white text-center">2.4. Verificações dos Pontaletes</h4>
                <br/>
            <div class="row text-center">
        <?php

                //Verificação dos Pontaletes.
                //Verifica a maior força dos Pontaletes a se considerar nas verificações.
                $npo = max($bc, $ed);
                ?> 
                <div class="col">
                    <label ><h5>Maior Normal Aplicada</h5></label>
                        <br/>
                        <div ><?php echo $npo. " Kgf (Tração)<br>";?></div>
                </div>
        <?php

                //Cálculo da Tensão Normal nos Pontaletes.
                $tntpo = round(($npo / ($basepo * $altpo)), 3);
                        //Imprimi Compressão caso o resultado 'tntpo' seja negativo.
                        if ($tntpo < 1){
        ?> 
                <div class="col">
                    <label ><h5>Tensão no Pontalete</h5></label>
                        <br/>
                        <div ><?php echo number_format(-$tntpo, 3). " Kgf/m² (Compressão)<br>";?></div>
                </div>
        <?php
                        }
                        //Imprimi Tração caso o resultado 'tntpo' seja positivo.
                        if ($tntpo > 1){
        ?> 
                <div class="col">
                    <label ><h5>Tensão no Pontalete</h5></label>
                        <br/>
                        <div ><?php echo number_format($tntpo, 3). " (Tração)<br>";?></div>
                </div>
        <?php
                        }
        ?> 
            </div>
            <br/>
            <div class="row text-center">
        <?php

                //Verificação quanto à flexão
                $condpo = round((($tntpo / 10000) / ($fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntpo' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condpo < 1){
        ?> 
                <div class="col">
                    <label ><h5>Flexotração - Condição</h5></label>
                        <br/>
                        <div ><?php echo number_format($condpo, 3). " &le; 1 (Atende)<br>";?></div><?php

                            if (0.7 < $condpo){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condpo) && ($condpo <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado seu pontalete pode estar superdimensionado</h6></label><?php
                            }

                            if ($condpo < 0.4){
                            ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção do pontalete.</h6></label><?php
                            }?>
                </div>
        <?php
                        }
                        //Imprimi Não atende caso o resultado 'tntpo' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condpo > 1){
        ?> 
                <div class="col">
                    <label ><h5>Flexotração - Condição</h5></label>
                        <br/>
                        <div ><?php echo number_format($condpo, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - aumente a seção do pontalete.</h6></label>
                </div>
        <?php
                        }
        ?> 
            </div>
            <br/>
        <?php
                //Fim da Verificação.
                //Fim da Verificação dos Pontaletes.

        ?>
                <h4 class="p-1 mb-1 bg-dark text-white text-center">2.5. Verificações do Pendural</h4>
                <br/>
            <div class="row text-center">
        <?php

                //Verificação do Pendural.
                //Verifica a maior força do Pendural a se considerar nas verificações.
                $npe = max($fg, $gf);
        ?> 
                <div class="col">
                    <label ><h5>Maior Normal Aplicada</h5></label>
                        <br/>
                        <div ><?php echo $npe. " &ge; 1 (Tração)<br>";?></div>
                </div>
        <?php

                //Cálculo da Tensão Normal no Pendural.
                $tntpe = round(($npe / ($basepe * $altpe)), 3);
                        //Imprimi Compressão caso o resultado 'tntpe' seja negativo.
                        if ($tntpe < 1){
        ?> 
                <div class="col">
                    <label ><h5>Tensão no Pendural</h5></label>
                        <br/>
                        <div ><?php echo number_format(-$tntpe, 3). " (Compressão)<br>";?></div>
                </div>
        <?php
                        }
                        //Imprimi Tração caso o resultado 'tntpe' seja positivo.
                        if ($tntpe > 1){
        ?> 
                <div class="col">
                    <label ><h5>Tensão no Pendural</h5></label>
                        <br/>
                        <div ><?php echo number_format($tntpe, 3). " (Tração)<br>";?></div>
                </div>
        <?php
                        }
        ?> 
            </div>
            <br/>
            <div class="row text-center">
        <?php
                //Verificação quanto à flexão
                $condpe = round((($tntpe / 10000) / ($fcod * 10)), 3);
                        //Imprimi Atende caso o resultado 'tntpe' seja menor do que 1, atendendo as exigencias da norma EuroCode5.
                        if ($condpe < 1){
        ?> 
                <div class="col">
                    <label ><h5>Flexotração</h5></label>
                        <br/>
                        <div ><?php echo number_format($condpe, 3). " &le; 1 (Atende)<br>";?></div>
                        <?php

                            if (0.7 < $condpo){
                                ?><br/><label ><h6 class="text-success">*Ótimo os parâmetros são adequados.</h6></label><?php
                            }

                            if ((0.4 <= $condpo) && ($condpo <= 0.7)){
                                ?><br/><label ><h6 class="text-warning">*Cuidado seu pendural pode estar superdimensionado</h6></label><?php
                            }

                            if ($condpo < 0.4){
                            ?><br/><label ><h6 class="text-danger">*Superdimensionado* - Tente diminuir a seção do pendural.</h6></label><?php
                            }?>
                </div>
        <?php
                        }
                        //Imprimi Não atende caso o resultado 'tntpe' seja maior do que 1, não atendendo as exigencias da norma EuroCode5.
                        if ($condpe > 1){
        ?> 
                <div class="col">
                    <label ><h5>Flexotração</h5></label>
                        <br/>
                        <div ><?php echo number_format($condpe, 3). " &ge; 1 (Não atende)<br>";?></div>
                        <br/><label ><h6 class="text-danger">*Não atende - aumente a seção do pendural.</h6></label>
                </div>
        <?php
                        }
                //Fim da Verificação.
                //Fim da Verificação do Pendural.
        ?>

        <?php 
            Database::disconnect();
        ?>
    </body>
</html>