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
                $madeira = $_GET['madeiraData'];
                $pdo = Database::connect();
                //SHOW COLUMNS FROM tbl
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT categoria, tipomadeira, genero, especie, descricao, rbas, ec0, fc0, fm, ft0, ft90, fv FROM madeira_tbl WHERE id=$madeira";

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>
                            <td>Categoria </td>
                            <td>'. $row['categoria'] . '</td>
                        </tr>';
                    echo '<tr>
                        <td>Tipo </td>
                        <td>'. $row['tipomadeira'] . '</td>
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
                        <td>Peso Específico (kg/m³) </td>
                        <td>'. $row['rbas'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Módulo de elasticidade (kgf/cm²) </td>
                        <td>'. $row['ec0'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Compressão verde(kgf/cm²) </td>
                        <td>'. $row['fc0'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à flexão verde (kgf/cm²) </td>
                        <td>'. $row['fm'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Tração 0° verde (kgf/cm²) </td>
                        <td>'. $row['ft0'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. à Tração 90° verde (kgf/cm²) </td>
                        <td>'. $row['ft90'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Resist. Cisalhamento verde (kgf/cm²) </td>
                        <td>'. $row['fv'] . '</td>
                    </tr>';
                }
                Database::disconnect();               
            ?>
         </table>
            <a href="gridMateriais.php" class="btn btn-secondary">sair</a>
        
    </body>
</html>                            
