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
        <!-- dados dos usuarios-->

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
            <?php  include "../core/verifica_session.php";
                include '../core/Database.php';
                $usuario = $_GET['UsrData'];
                $pdo = Database::connect();
                //SHOW COLUMNS FROM tbl
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT nomeUsuario, dtNasc, telefone, celular, contato, endereco, numero, cep, bairro, complemento, cidade, uf, cpfcnpj, rginsest, usuario, tipoUsuario, status FROM usuarios_tbl WHERE id=$usuario";

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>
                            <td>Nome do Usuario </td>
                            <td>'. $row['nomeUsuario'] . '</td>
                        </tr>';
                    echo '<tr>
                        <td>Data Nascimento </td>
                        <td>'. $row['dtNasc'] . '</td>
                        </tr>';
                    echo '<tr>
                        <td>Telefone </td>
                        <td>'. $row['telefone'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Celular </td>
                        <td>'. $row['celular'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Contato </td>
                        <td>'. $row['contato'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Endereço </td>
                        <td>'. $row['endereco'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Numero </td>
                        <td>'. $row['numero'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>CEP </td>
                        <td>'. $row['cep'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Bairro </td>
                        <td>'. $row['bairro'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Complemento </td>
                        <td>'. $row['complemento'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Cidade </td>
                        <td>'. $row['cidade'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>UF </td>
                        <td>'. $row['uf'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>CPF/CNPJ </td>
                        <td>'. $row['cpfcnpj'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>RG/INSC ESTADUAL </td>
                        <td>'. $row['rginsest'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Usuário </td>
                        <td>'. $row['usuario'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Tipo de Usuário </td>
                        <td>'. $row['tipoUsuario'] . '</td>
                    </tr>';
                    echo '<tr>
                        <td>Status </td>
                        <td>'. $row['status'] . '</td>
                    </tr>';

                }
                Database::disconnect();               
            ?>
         </table>
            <a href="gridUsuario.php" class="btn btn-secondary">sair</a>
        
    </body>
</html>                            
