<?php  include "../core/verifica_session.php";
     
    require '../core/Database.php';
 
   if ( !empty($_POST)) {
        $acao = $_POST['acao'];

        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $nomeUsuario = $_POST['nomeUsuario'];
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
            $usuario = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $tipoUsuario = $_POST['tipoUsuario'];
            $status = $_POST['status'];

/* 
            echo $nomeUsuario."<BR>";
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
            echo $cnpj."<BR>";
            echo $cpf."<BR>";
            echo $rg."<BR>";
            echo $usuario."<BR>";
            echo $senha."<BR>";
            echo $tipoUsuario."<BR>";
            echo $status."<BR>"; */

            //descomente o treco abaixo para saber se os valores do formulario estão corretos
         
            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios_tbl (nomeUsuario, dtNasc, telefone, celular, contato, endereco, numero, cep, bairro, complemento, cidade, uf, cpfcnpj, rginsest, usuario, senha, tipoUsuario, status) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nomeUsuario, $dtnasc, $telfixo, $celular, $contato, $endereco, $numero, $cep, $bairro, $complemento, $cidade, $uf, $cpfcnpj, $rginsest, $usuario, $senha, $tipoUsuario, $status));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/gridUsuario.php'</script>";
            }

        }

        if ($acao == 'apagar'){
            // apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM usuarios_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado da Base de Dados!');document.location='../visual/gridUsuario.php'</script>";
            }
        }    

         if ($acao == 'alterar'){
            $usrData = $_POST['usrData'];
            $nomeUsuario = $_POST['nomeUsuario'];
            //$dtNasc = $_POST['dtNasc'];
            // converter data para o formato do MySQL
            $dtNasc = date("Y-m-d",strtotime(str_replace('/','-',$_POST['dtNasc'])));  
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
/*             $usuario = $_POST['usuario'];
            $senha = md5($_POST['senha']); */
            $tipoUsuario = $_POST['tipoUsuario'];
            $status = $_POST['status'];

 
            /* echo $nomeUsuario."<BR>";
            echo $dtNasc."<BR>";  
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
            echo $cnpj."<BR>";
            echo $cpf."<BR>";
            echo $rg."<BR>";
            // echo $usuario."<BR>";
            // echo $senha."<BR>";
            echo $tipoUsuario."<BR>";
            echo $status."<BR>";  */

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuarios_tbl SET nomeUsuario=?, dtNasc=?, telefone=?, celular=?, contato=?, endereco=?, numero=?, cep=?, bairro=?, complemento=?, cidade=?, uf=?, cpfcnpj=?, rginsest=?, tipoUsuario=?, status=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nomeUsuario, $dtNasc, $telfixo, $celular, $contato, $endereco, $numero, $cep, $bairro, $complemento, $cidade, $uf, $cpfcnpj, $rginsest, $tipoUsuario, $status, $usrData));
            Database::disconnect();

            //redireciona para agenda
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/gridUsuario.php'</script>";
            }
        } 
    }