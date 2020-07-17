<?php  include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $tipo = $_POST['tipo'];
            $nome = $_POST['nome'];
            $dtNasc = $_POST['dtNasc'];
            // converter data para o formato do MySQL
            $dtnasc = date("Y-m-d",strtotime(str_replace('/','-',$dtNasc)));  
            $telfixo = $_POST['telfixo'];
            $celular = $_POST['celular'];
            $contato = $_POST['contato'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $cpfcnpj = $_POST['cpfcnpj'];
            $rginsest = $_POST['rginsest'];

 
            /* echo $tipo."<BR>";
            echo $nome."<BR>";
            echo $dtnasc."<BR>";  
            echo $telfixo."<BR>";
            echo $celular."<BR>";
            echo $contato."<BR>";
            echo $endereco."<BR>";
            echo $numero."<BR>";
            echo $cep."<BR>";
            echo $bairro."<BR>";
            echo $complemento."<BR>";
            echo $cidade."<BR>";
            echo $uf."<BR>";
            echo $cpfcnpj."<BR>";
            echo $rginsest."<BR>"; */

            //descomente o treco abaixo para saber se os valores do formulario estão corretos
         
            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO clientes_tbl (tipo, nome, dtNasc, telfixo, celular, contato, endereco, numero, cep, bairro, complemento, cidade, uf, cpfcnpj, rginsest) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipo, $nome, $dtnasc, $telfixo, $celular, $contato, $endereco, $numero, $cep, $bairro, $complemento, $cidade, $uf, $cpfcnpj, $rginsest));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/gridCliente.php'</script>";
            }
        }        

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM clientes_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/gridCliente.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['clientData'];
            $tipo = $_POST['tipo'];
            $nome = $_POST['nome'];
            $dtNasc = $_POST['dtNasc'];
            // converter data para o formato do MySQL
            $dtnasc = date("Y-m-d",strtotime(str_replace('/','-',$dtNasc)));  
            $telfixo = $_POST['telfixo'];
            $celular = $_POST['celular'];
            $contato = $_POST['contato'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $cpfcnpj = $_POST['cpfcnpj'];
            $rginsest = $_POST['rginsest'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE clientes_tbl SET tipo=?, nome=?, dtNasc=?, telfixo=?, celular=?, contato=?, endereco=?, numero=?, cep=?, bairro=?, complemento=?, cidade=?, uf=?, cpfcnpj=?, rginsest=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipo, $nome, $dtNasc, $telfixo, $celular, $contato, $endereco, $numero, $cep, $bairro, $complemento, $cidade, $uf, $cpfcnpj, $rginsest, $usrData));
            Database::disconnect();

            //redireciona para a gridCliente
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/gridCliente.php'</script>";
            }
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