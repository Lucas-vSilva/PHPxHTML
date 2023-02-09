<?php
 require_once('Connect.php');
 class Consultar{

     public function ConsultarInd(Conexao $conexao, string $nomeDaTabela, int $id){
         //Consultar
         try{
             $conn = $conexao->Conectar();
             $sql = "select * from $nomeDaTabela where id = '$id'";
             $result = mysqli_query($conn, $sql);
             
             while($dados = mysqli_fetch_Array($result)){
                 if($dados["id"] == $id){
                     echo "<br><br>ID:  ".$dados["id"]."<br>Nome: ".$dados["nome"]."<br>CPF: ".$dados["cpf"]."<br>Telefone: ".$dados["telefone"];
                 }
             }//fim do while

             mysqli_close($conn);
         }catch(Except $erro){
             echo $erro;
         }
     }//fim do Consultar

     public function ConsultarTudo(Conexao $conexao, string $nomeDaTabela){
         //Consultar
         try{
             $conn = $conexao->Conectar();
             $sql = "select * from $nomeDaTabela";
             $result = mysqli_query($conn, $sql);
             
             while($dados = mysqli_fetch_Array($result)){
                echo "<br><br>ID:  ".$dados["id"]."<br>Nome: ".$dados["nome"]."<br>CPF: ".$dados["cpf"]."<br>Telefone: ".$dados["telefone"];
             }//fim do while

             mysqli_close($conn);
         }catch(Except $erro){
             echo $erro;
         }
     }//fim do Consultar
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<body>
    <form method="POST">
        <label>Código: </label>
        <input type="number" name="tId"/><br><br>

        <button>Consultar</button>
        <textarea>
            <?php
                if($_POST['tId'] != 0){
                    $conexao = new Conexao();
                    $cons    = new Consultar();
                    echo $cons->ConsultarInd($conexao, "pessoa", $_POST['tId']);
                    return;
                }
                echo "Erro, preencha o campo";
            ?>
        </textarea>


    </form>
        <a href="Insert.php"><button>Inserir</button></a>
        <a href="Update.php"><button>Atualizar</button></a>
        <a href="Delete.php"><button>Deletar</button></a>
    
</body>
</html>