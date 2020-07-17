<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">

            <label>Genero da madeira</label>
                <select id="espmadeira" name="espmadeira" required>
                    <?php
                        require_once('../core/Database.php');
                        $pdo = new Conexao(); 
                        $resultado = $pdo->select("SELECT genero FROM madeira_tbl");
                        $pdo->desconectar();
                                  
                        if(count($resultado)){
                        foreach ($resultado as $res) {
                    ?>                                             
                    <table>
                        <tr>
                            <td>Genero</td>
                        </tr>
                        <?php while($dado = $con->fetch_array()){ ?>
                        <tr>
                            <td><?php echo $dado["genero"]; ?></td>
                        <?php } ?>
                    </table>
                    <?php      
                        }
                    }
                    ?>
                </select>
                </head>