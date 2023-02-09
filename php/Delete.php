<?php
require_once('Connect.php');
class Excluir{
    public function Deletar(Conexao $conexao, string $nomeDaTabela, int $id){
        //Excluir
        try{
            $conn = $conexao->Conectar();
            $sql = "delete from $nomeDaTabela where id = $id";
            $result = mysqli_query($conn,$sql);

            if($result){
                return "<br><br>Excluido com sucesso!";
            }else{
                return "<br><br>Não consultado!";
            }

            mysqli_close($conn);
        }catch(Except $erro){
            echo $erro;
        }
    }//fim do Excluir
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>
<body>
    <form method="POST">
        <label>Código:</label>
        <input type="number" name="tId">
        <button>Deletar</button>
        <?php
                        if($_POST['tId'] > 0){
                            $conexao = new Conexao();
                            $del    = new Excluir();
                            echo $del->Deletar($conexao, "pessoa", $_POST['tId']);
                            return;
                        }
                        echo "Erro, preencha o campo";
                    ?>
    </form>
        <a href="Insert.php"><button>Inserir</button></a>
        <a href="Update.php"><button>Atualizar</button></a>
        <a href="Select.php"><button>Consultar</button></a>
    
</body>
</html>