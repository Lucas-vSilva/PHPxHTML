<?php


    require_once('Connect.php');

    class Atualizar{
        public function update(Conexao $conexao, string $campo, string $novoDado,
                               string $id, string $nomeTabela)
        {
            try{
                $conn   = $conexao->conectar();
                $sql    = "update $nomeTabela set $campo = '$novoDado' where id = '$id'";
                $result = mysqli_query($conn,$sql);
                
                mysqli_close($conn);
                
                if($result){
                    echo "<br><br>Atualizado com sucesso!";
                    return;
                }
                echo "<br><br>Impossível Atualizar!"; 
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do atualizar
    }//fim da classe
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body>
    <form method="POST">
        <label>Código: </label>
        <input type="number" name="tId" required/><br><br>

        <label>Campo: </label>
        <input type="text" name="tCampo" required/><br><br>

        <label>Novo Dado: </label>
        <input type="text" name="tNovoDado" required/><br><br>

        <button>Atualizar</button>

        <?php
            if($_POST['tCampo'] != "" && $_POST['tNovoDado'] != "" && $_POST['tId'] != 0){
                $conexao = new Conexao();
                $atu     = new Atualizar();
                echo $atu->update($conexao, $_POST['tCampo'],
                                 $_POST['tNovoDado'],$_POST['tId'], "pessoa");
                return; 
            }
            echo "Impossível Atualizar, preencha os campos!";
        ?>
    </form>
    <a href="Select.php"><button>Consultar</button></a>
    <a href="Insert.php"><button>Inserir</button></a>
    <a href="Delete.php"><button>Excluir</button></a>
</body>
</html>