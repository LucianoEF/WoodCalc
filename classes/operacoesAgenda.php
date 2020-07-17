<?php
    //Database connection
    require '../_core/Database.php';
    
    if ( !empty($_GET)) {
        // capture action information
        $acao = $_GET['acao'];
        $compromisso = $_GET['id'];

        if ($acao == 'encerrar'){
            //update data
            $fechar = 'close';
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE agenda SET status=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($fechar,$compromisso));
            header("Location: ../_reports/listarCompromissos.php");
        }

        if ($acao == 'apagar'){
            // delete data
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM agenda WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($compromisso));
            Database::disconnect();
            header("Location: ../_reports/listarCompromissos.php");
        }
    
    } 