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

        <div class="p-3 mb-2 bg-dark text-white"><h3 class="text-center">Cadastro de Usuários</h3></div>

        <form class="form-inline" name="pesquisar" action="pesquisar">
            <input style="margin-left: 20px;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar Usuário" aria-label="Search">
            <button style="margin-right: 920px;" class="btn btn-primary btn-sm" type="submit">Pesquisar</button>

            <a style="margin-right: 20px;" href="frmUsuarios.php?op=cadastrar" class="btn btn-primary">Cadastrar</a>
        </form>
        <br/>

        <table class="table">
        <form>
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"><img src="../img/pasta_dados.png" width="35px" height="35px"></th>
                    <th scope="col"><img src="../img/ficha3.png" width="35px" height="35px"></th>
                    <!-- <th scope="col"><img src="../img/warning.png" width="35px" height="35px"></th> -->
                    <th scope="col"><img src="../img/trash.png" width="35px" height="35px"></th>
                </tr>
            </thead>
            <tbody>
            <?php  
                include '../core/Database.php';
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT id, nomeUsuario, usuario, celular  FROM usuarios_tbl WHERE status='Ativo' ORDER BY nomeUsuario ASC";

                foreach ($pdo->query($sql) as $row) {
                         echo '<tr>';
                         echo '<td>'. $row['id'] . '</td>';
                         echo '<td>'. $row['nomeUsuario'] . '</td>';
                         echo '<td>'. $row['usuario'] . '</td>';
                         echo '<td>'. $row['celular'] . '</td>';
                         //converter data do padrão do banco de dados para o pt-br
                        /*  $data = date("d-m-Y",strtotime(str_replace('-','/',$row['data']))); 
                         echo '<td>'. $data . '</td>';
                         echo '<td>'. $row['hora'] . '</td>'; */

                        // echo '</tr>';
               
            ?>
             
                <td>
                    <!--Carregar os dados completos de cada usuario -->
                    <?php 
                        echo '<a class="btn btn-outline-secondary" href="dadosUsuario.php?UsrData='. $row['id'] . '">Dados</a>';
                    ?>
                </td>  
                <td>
                    <!--Botão que chama o formulario de alteração dos dados do usuario -->
                    <?php 
                        echo '<a class="btn btn-outline-secondary" href="frmUsuarios.php?UsrData='. $row['id'] . '&op=alterar">Alterar</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama a função de exclusão dos registros do usuario -->
                    <form name="frmApagar" action="../classes/operacoesUsuarios.php" method="post">
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
