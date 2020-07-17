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
       <?php   include "../core/verifica_session.php";
            include "menu.html";
        ?>

        <div class="p-3 mb-2 bg-dark text-white"><h3 class="text-center">Cadastro de Materiais</h3></div>
        
        <form class="form-inline">
            <input style="margin-left: 20px;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar Material" aria-label="Search">
            <button style="margin-right: 920px;" class="btn btn-primary btn-sm" type="submit">Pesquisar</button>
            
            <a style="margin-right: 20px;" href="frmMateriais.php" class="btn btn-primary">Cadastrar</a>
        </form>
        <br/>

        <table class="table">
        <form>        
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col"><img src="../img/pasta_dados.png" width="35px" height="35px"></th>
                    <th scope="col"><img src="../img/ficha3.png" width="35px" height="35px"></th>
                    <th scope="col"><img src="../img/trash.png" width="35px" height="35px"></th>
                </tr>
            </thead>
            <tbody>
            <?php   
                include '../core/Database.php';
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //puxa cadastros dos materiais cadastrados na categoria madeira
                $sql = "SELECT id, categoria, tipomadeira, descricao FROM madeira_tbl ORDER BY categoria ASC";

                foreach ($pdo->query($sql) as $row){
                    echo '<tr>';
                    echo '<td>'. $row['categoria'] . '</td>';
                    echo '<td>'. $row['tipomadeira'] . '</td>';
                    echo '<td>'. $row['descricao'] . '</td>';
            ?>    
                    <td>
                    <!--Carregar os dados completos de cada madeira verde-->
                    <?php        
                    echo '<a class="btn btn-outline-secondary" href="dadosMadeira.php?madeiraData=' . $row['id'] . '">Dados</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados do madeira verde-->
                    <?php
                    echo '<a class="btn btn-outline-secondary" href="frmMadeira.php?madeiraData=' . $row['id'] . '&op=alterar">Alterar</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama a função de exclusão dos registros da madeira verde-->
                    <form name="frmApagar" action="../classes/operacoesMadeira.php" method="post">
                        <input type="hidden" name="acao" value="apagar">
                        <input type="hidden" <?php echo 'value="'.$row["id"].'"'; ?>  name="idUser">
                        <input class="btn btn-outline-danger" type="submit" value="Apagar">
                    </form>
                </td>
            <tr>
            <?php  }
                Database::disconnect();
            ?>

            <?php
                //puxa cadastros dos materiais cadastrados na categoria madeira úmida
                $pdo = Database::connect();
                $sql = "SELECT id, categoria, tipo, descricao FROM madeiraum_tbl ORDER BY categoria ASC";

                foreach ($pdo->query($sql) as $row){ 
                    echo '<tr>';
                    echo '<td>'. $row['categoria'] . '</td>';
                    echo '<td>'. $row['tipo'] . '</td>';
                    echo '<td>'. $row['descricao'] . '</td>';

            ?>    
                <td>
                    <!--Carregar os dados completos de cada madeira úmida-->
                    <?php        
                    echo '<a class="btn btn-outline-secondary" href="dadosMadeiraUm.php?madeiraumData=' . $row['id'] . '">Dados</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados do madeira úmida-->
                    <?php
                    echo '<a class="btn btn-outline-secondary" href="frmMadeiraUm.php?madeiraumData=' . $row['id'] . '&op=alterar">Alterar</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama a função de exclusão dos registros da madeira úmida-->
                    <form name="frmApagar" action="../classes/operacoesMadeiraUm.php" method="post">
                        <input type="hidden" name="acao" value="apagar">
                        <input type="hidden" <?php echo 'value="'.$row["id"].'"'; ?>  name="idUser">
                        <input class="btn btn-outline-danger" type="submit" value="Apagar">
                    </form>
                </td>
            <tr>
            <?php  }
                Database::disconnect();
            ?>

            <?php
                //puxa cadastros dos materiais cadastrados na categoria telha
                $pdo = Database::connect();
                $sql = "SELECT id, categoria, tipotelha, descricao FROM telha_tbl ORDER BY categoria ASC";

                foreach ($pdo->query($sql) as $row){
                    echo '<tr>';
                    echo '<td>'. $row['categoria'] . '</td>';
                    echo '<td>'. $row['tipotelha'] . '</td>';
                    echo '<td>'. $row['descricao'] . '</td>';

            ?>
                <td>
                    <!--Carregar os dados completos de telha-->
                    <?php        
                    echo '<a class="btn btn-outline-secondary" href="dadosTelha.php?telhaData=' . $row['id'] . '">Dados</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados da telha-->
                    <?php
                    echo '<a class="btn btn-outline-secondary" href="frmTelha.php?telhaData=' . $row['id'] . '&op=alterar">Alterar</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama a função de exclusão dos registros da telha-->
                    <form name="frmApagar" action="../classes/operacoesTelha.php" method="post">
                        <input type="hidden" name="acao" value="apagar">
                        <input type="hidden" <?php echo 'value="'.$row["id"].'"'; ?>  name="idUser">
                        <input class="btn btn-outline-danger" type="submit" value="Apagar">
                    </form>
                </td>
            <tr>
            <?php  }
                Database::disconnect();
            ?>

            <?php
                //puxa cadastros dos materiais cadastrados na categoria prego
                $pdo = Database::connect();
                $sql = "SELECT id, categoria, tipo, descricao FROM prego_tbl ORDER BY categoria ASC";

                foreach ($pdo->query($sql) as $row){
                    echo '<tr>';
                    echo '<td>'. $row['categoria'] . '</td>';
                    echo '<td>'. $row['tipo'] . '</td>';
                    echo '<td>'. $row['descricao'] . '</td>';

            ?>
                <td>
                    <!--Carregar os dados completos de prego-->
                    <?php        
                    echo '<a class="btn btn-outline-secondary" href="dadosPrego.php?pregoData=' . $row['id'] . '">Dados</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados da prego-->
                    <?php
                    echo '<a class="btn btn-outline-secondary" href="frmPrego.php?pregoData=' . $row['id'] . '&op=alterar">Alterar</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama a função de exclusão dos registros da prego-->
                    <form name="frmApagar" action="../classes/operacoesPrego.php" method="post">
                        <input type="hidden" name="acao" value="apagar">
                        <input type="hidden" <?php echo 'value="'.$row["id"].'"'; ?>  name="idUser">
                        <input class="btn btn-outline-danger" type="submit" value="Apagar">
                    </form>
                </td>
            <tr>
            <?php  }
                Database::disconnect();
            ?>

            </tbody>
        </table>
    </body>
</html>                            
