<?php  include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $categoria = $_POST['categoria'];
            $tipo = $_POST['tipo'];
            $descricao = $_POST['descricao'];
 
            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO prego_tbl (categoria, tipo, descricao) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $tipo, $descricao));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }

        }

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM prego_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid materiais
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['pregoData'];
            $categoria = $_POST['categoria'];
            $tipo = $_POST['tipo'];
            $descricao = $_POST['descricao'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE prego_tbl SET categoria=?, tipo=?, descricao=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $tipo, $descricao, $usrData));
            Database::disconnect();

            //redireciona para a gridMateriais
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }
    }