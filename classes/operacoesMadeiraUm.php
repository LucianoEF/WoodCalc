<?php  include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $categoria = $_POST['categoria'];
            $tipo = $_POST['tipo'];
            $genero = $_POST['genero'];
            $especie = $_POST['especie'];
            $descricao = $_POST['descricao'];
            $rap15 = $_POST['rap15'];
            $lmtproporcionalidade = $_POST['lmtproporcionalidade'];
            $ec0 = $_POST['ec0'];
            $fm15 = $_POST['fm15'];
            $ft0 = $_POST['ft0'];
            $ft90 = $_POST['ft90'];
            $fc015 = $_POST['fc015'];
            $fv = $_POST['fv'];

            //descomente o treco abaixo para saber se os valores do formulario estão corretos

            /* echo $genero."<BR>";
            echo $especie."<BR>";
            echo $descricao."<BR>";  
            echo $rap15."<BR>";
            echo $lmtproporcionalidade."<BR>";
            echo $ec0."<BR>";
            echo $fc015."<BR>";
            echo $fm15."<BR>";
            echo $ft0."<BR>";
            echo $ft90."<BR>";
            echo $fv."<BR>"; */

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO madeiraum_tbl (categoria, tipo, genero, especie, descricao, rap15, lmtproporcionalidade, ec0, fm15, ft0, ft90, fc015, fv) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $tipo, $genero, $especie, $descricao, $rap15, $lmtproporcionalidade, $ec0, $fm15, $ft0, $ft90, $fc015, $fv));
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
            $sql = "DELETE FROM madeiraum_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid materiais
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['madeiraumData'];
            $categoria = $_POST['categoria'];
            $tipo = $_POST['tipo'];
            $genero = $_POST['genero'];
            $especie = $_POST['especie'];
            $descricao = $_POST['descricao'];
            $rap15 = $_POST['rap15'];
            $lmtproporcionalidade = $_POST['lmtproporcionalidade'];
            $ec0 = $_POST['ec0'];
            $fm15 = $_POST['fm15'];
            $ft0 = $_POST['ft0'];
            $ft90 = $_POST['ft90'];
            $fc015 = $_POST['fc015'];
            $fv = $_POST['fv'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE madeiraum_tbl SET categoria=?, tipo=?, genero=?, especie=?, descricao=?, rap15=?, lmtproporcionalidade=?, ec0=?, fm15=?, ft0=?, ft90=?, fc015=?, fv=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $tipo, $genero, $especie, $descricao, $rap15, $lmtproporcionalidade, $ec0, $fm15, $ft0, $ft90, $fc015, $fv, $usrData));
            Database::disconnect();

            //redireciona para a gridCliente
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }
    }