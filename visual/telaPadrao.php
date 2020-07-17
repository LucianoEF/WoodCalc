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
       <?php
            include "menu.html";
        ?>
        
        <table class="table">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1"><button type="button" class="btn btn-secondary">Pesquisar</button></label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Pesquisar">
            </div>
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"><img src="../img/ficha3.png" width="35px" height="35px"></th>
                    <th scope="col"><img src="../img/trash.png" width="35px" height="35px"></th>
                    <th scope="col"><img src="../img/pasta_dados.png" width="35px" height="35px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">#</th>
                    <td>Luciano E. Ferreira</td>
                    <td>LucFer</td>
                    <td>(45) 99107-7185</td>
                    <td><button type="button" class="btn btn-warning">Alterar</button></td>
                    <td><button type="button" class="btn btn-danger">Apagar</button></td>
                    <td><button type="button" class="btn btn-primary">Visualizar</button></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th scope="row">#</th>
                    <td>Fulano</td>
                    <td>Ful</td>
                    <td>(xx) xxxxx-xxxx</td>
                    <td><button type="button" class="btn btn-warning">Alterar</button></td>
                    <td><button type="button" class="btn btn-danger">Apagar</button></td>
                    <td><button type="button" class="btn btn-primary">Visualizar</button></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th scope="row">#</th>
                    <td>Beltrano</td>
                    <td>Bel</td>
                    <td>(xx) xxxxx-xxxx</td>
                    <td><button type="button" class="btn btn-warning">Alterar</button></td>
                    <td><button type="button" class="btn btn-danger">Apagar</button></td>
                    <td><button type="button" class="btn btn-primary">Visualizar</button></td>
                </tr>
            </tbody>
        </table>
            <a href="telacadastroUsuario.php" class="btn btn-primary">Cadastrar</a>
            <a href="abertura.php" class="btn btn-secondary">sair</a>
        
    </body>
</html>                            
