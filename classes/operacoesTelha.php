<?php  include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $categoria = $_POST['categoria'];
            $tipotelha = $_POST['tipotelha'];
            $descricao = $_POST['descricao'];
            $pesoproprio = $_POST['pesoproprio'];
            $expessura = $_POST['expessura'];
            $qtdapoios = $_POST['qtdapoios'];
            $distapoios = $_POST['distapoios'];

             //descomente o treco abaixo para saber se os valores do formulario estão corretos

            /* echo $tipo."<BR>";
            echo $descricao."<BR>";  
            echo $expessura."<BR>";
            echo $qtdapoios."<BR>";
            echo $distapoios."<BR>"; */

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO telha_tbl (categoria, tipotelha, descricao, pesoproprio, expessura, qtdapoios, distapoios) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $tipotelha, $descricao, $pesoproprio, $expessura, $qtdapoios, $distapoios));
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
            $sql = "DELETE FROM telha_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid materiais
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['telhaData'];
            $categoria = $_POST['categoria'];
            $tipotelha = $_POST['tipotelha'];
            $descricao = $_POST['descricao'];
            $pesoproprio = $_POST['pesoproprio'];
            $expessura = $_POST['expessura'];
            $qtdapoios = $_POST['qtdapoios'];
            $distapoios = $_POST['distapoios'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE telha_tbl SET categoria=?, descricao=?, pesoproprio=?, expessura=?, qtdapoios=?, distapoios=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $descricao, $pesoproprio, $expessura, $qtdapoios, $distapoios, $usrData));
            Database::disconnect();

            //redireciona para a gridMateriais
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }
    }