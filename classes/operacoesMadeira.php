<?php include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $categoria = $_POST['categoria'];
            $tipomadeira = $_POST['tipomadeira'];
            $genero = $_POST['genero'];
            $especie = $_POST['especie'];
            $descricao = $_POST['descricao'];
            $rbas = $_POST['rbas'];
            $ec0 = $_POST['ec0'];
            $fm = $_POST['fm'];
            $ft0 = $_POST['ft0'];
            $ft90 = $_POST['ft90'];
            $fc0 = $_POST['fc0'];
            $fv = $_POST['fv'];

            //descomente o treco abaixo para saber se os valores do formulario estão corretos

            /* echo $tipomadeira."<BR>";
            echo $genero."<BR>";
            echo $especie."<BR>";
            echo $descricao."<BR>";  
            echo $rbas."<BR>";
            echo $lmtproporcionalidade."<BR>";
            echo $ec0."<BR>";
            echo $fc0."<BR>";
            echo $fm."<BR>";
            echo $ft0."<BR>";
            echo $ft90."<BR>";
            echo $fv."<BR>"; */
            

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo $sql = "INSERT INTO madeira_tbl (categoria, tipomadeira, genero, especie, descricao, rbas, ec0, fm, ft0, ft90, fc0, fv) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $tipomadeira, $genero, $especie, $descricao, $rbas, $ec0, $fm, $ft0, $ft90, $fc0, $fv));
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
            $sql = "DELETE FROM madeira_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid materiais
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['madeiraData'];
            $tipomadeira = $_POST['tipomadeira'];
            $genero = $_POST['genero'];
            $especie = $_POST['especie'];
            $descricao = $_POST['descricao'];
            $rbas = $_POST['rbas'];
            $ec0 = $_POST['ec0'];
            $fm = $_POST['fm'];
            $ft0 = $_POST['ft0'];
            $ft90 = $_POST['ft90'];
            $fc0 = $_POST['fc0'];
            $fv = $_POST['fv'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE madeira_tbl SET genero=?, especie=?, descricao=?, rbas=?, ec0=?, fm=?, ft0=?, ft90=?, fc0=?, fv=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($genero, $especie, $descricao, $rbas, $ec0, $fm, $ft0, $ft90, $fc0, $fv, $usrData));
            Database::disconnect();

            //redireciona para a gridMateriais
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/gridMateriais.php'</script>";
            }
        }
    }