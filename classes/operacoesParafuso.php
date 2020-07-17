<?php  include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $norma = $_POST['norma'];
            $descricao = $_POST['descricao'];
            $polegadas = $_POST['polegadas'];
            $lmtescoamento = $_POST['lmtescoamento'];
            $resistracao = $_POST['resistracao'];
            $cargaprova = $_POST['cargaprova'];

 
            echo $norma."<BR>";
            echo $descricao."<BR>";  
            echo $polegadas."<BR>";
            echo $lmtescoamento."<BR>";
            echo $resistracao."<BR>";
            echo $cargaprova."<BR>";

            //descomente o treco abaixo para saber se os valores do formulario estão corretos
         
            //inserir os dados na base de dados.
            /* $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO parafuso_tbl (norma, descricao, polegadas, lmtescoamento, resistracao, cargaprova) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($norma, $descricao, $polegadas, $lmtescoamento, $resistracao, $cargaprova));
            Database::disconnect(); */
            
            //redireciona para o formulario de inserção
            /*if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/frmParafuso.php'</script>";
            } */

        }

            /* if ($acao == 'alterar'){
            $compromisso = $_POST['compromisso']; //id do compromisso que será alterado na base de dados, sem ele nada acontece.
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $data = $_POST['data'];
            // converter data para o formato do MySQL
            $data = date("Y-m-d",strtotime(str_replace('/','-',$data)));  
            $hora = $_POST['hora']; */

            //descomente o treco abaixo para saber se os valores do formulario estão corretos
            /* echo $compromisso . "<br />";
            echo $titulo . "<br />";
            echo $descricao . "<br />";
            echo $data . "<br />";
            echo $hora . "<br />"; */

            //realizar a alteração dos dados na base de dados.
            /*$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE agenda SET titulo=?, descricao=?, data=?, hora=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($titulo,$descricao,$data,$hora,$compromisso));
            Database::disconnect();

            //redireciona para agenda
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../_reports/listarCompromissos.php'</script>";
            }
        }*/
    }