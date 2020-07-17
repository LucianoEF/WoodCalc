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
                $telha = $_GET['telhaData'];
                $pdo = Database::connect();
                //SHOW COLUMNS FROM tbl
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT id, categoria, tipotelha, descricao, pesoproprio, expessura, qtdapoios, distapoios FROM telha_tbl WHERE id=$telha";

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>
                            <td>Categoria </td>
                            <td>'. $row['categoria'] . '</td>
                        </tr>';
                    echo '<tr>
                        <td>Tipo de Telha </td>
                        <td>'. $row['tipotelha'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Descrição </td>
                        <td>'. $row['descricao'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Peso Próprio (kgf/m²)</td>
                        <td>'. $row['pesoproprio'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Expessura (mm)</td>
                        <td>'. $row['expessura'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Quantidade de apoios </td>
                        <td>'. $row['qtdapoios'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Distância entre apoios (m) </td>
                        <td>'. $row['distapoios'] . '</td>
                    </tr>';
                }
                Database::disconnect();               
            ?>
         </table>
            <a href="gridMateriais.php" class="btn btn-secondary">sair</a>
        
    </body>
</html>                            
