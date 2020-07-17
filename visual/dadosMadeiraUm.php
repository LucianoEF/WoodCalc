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
    .navbar{
        margin-bottom: 1rem;
    }
</style>
</head>
    <body>
       <?php  include "../core/verifica_session.php";
            include "menu.html";
        ?>
        <!-- dados da madeira-->

        <br/>

        <table class="table">
        <form>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Informações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../core/Database.php';
                $madeiraum = $_GET['madeiraumData'];
                $pdo = Database::connect();
                //SHOW COLUMNS FROM tbl
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT categoria, tipo, genero, especie, descricao, rap15, lmtproporcionalidade, ec0, fc015, fm15, ft0, ft90, fv FROM madeiraum_tbl WHERE id=$madeiraum";

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>
                            <td>Categoria </td>
                            <td>'. $row['categoria'] . '</td>
                        </tr>';
                    echo '<tr>
                        <td>Tipo de Madeira </td>
                        <td>'. $row['tipo'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Gênero </td>
                        <td>'. $row['genero'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Espécie </td>
                        <td>'. $row['especie'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Descrição </td>
                        <td>'. $row['descricao'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Dens. da massa Aparente umidade(rap, 15) </td>
                        <td>'. $row['rap15'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Limite de proporcionalidade </td>
                        <td>'. $row['lmtproporcionalidade'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Módulo de elasticidade (Ec0) </td>
                        <td>'. $row['ec0'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Compres. 15% umid(fc0,15) </td>
                        <td>'. $row['fc015'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Flexão 15% umidade (fm,15) </td>
                        <td>'. $row['fm15'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Tração 0° 15% umid (ft,0) </td>
                        <td>'. $row['ft0'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Tração 90° 15% umid (ft,90) </td>
                        <td>'. $row['ft90'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. Cisalhamento 15% umidade (fv) </td>
                        <td>'. $row['fv'] . '</td>
                    </tr>';
                }
                Database::disconnect();               
            ?>
         </table>
            <a href="gridMateriais.php" class="btn btn-secondary">sair</a>
        
    </body>
</html>                            
