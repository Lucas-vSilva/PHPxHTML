<?php
    require_once('Connect.php');
    
    class Inserir{
//construtor lek
        public function cadastrar(
            Conexao $conexao,
            string $nomeDaTabela,
            string $nome,
            string $cpf,
            string $telefone)
    {   
        try
        {
            $conn = $conexao->Conectar();//abre a conexao
            $sql  = "insert into $nomeDaTabela (id, nome, cpf, telefone) values ('','$nome','$cpf','$telefone')";//escreve o script
            $result = mysqli_query($conn,$sql);//executa a ação acima.
            if($result){
                return "<br><br>Foi inserido kekw!";
            }
            return "<br><br>Não faz!!!";

            msqli_close($conn);//fechano
        }
        catch(Exception $erro)
        {
            echo $erro;
        }//fim do try catch
    }//fim do cadastrar
    //fim da classe
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserir</title>
    </head>
    <body>
        <form method="POST">
            <label>Nome: </label>
            <input type="text" name="tNome" placeholder="Informe seu nome"/><br><br>

            <label>CPF: </label>
            <input type="text" name="tCpf" placeholder="Informe seu CPF"/><br><br>

            <label>Telefone: </label>
            <input type="text" name="tTelefone" placeholder="Informe seu telefone"/><br><br>
            <button> Cadastrar </button>
            <?php
            if($_POST['tNome'] != "" && $_POST['tCpf'] != "" && $_POST['tCpf'] != ""){
                $conexao = new Conexao();
                $cad     = new Inserir();
                echo $cad->cadastrar($conexao, "pessoa",$_POST['tNome'],$_POST['tCpf'],$_POST['tTelefone']);
                return;
            }
            echo "Erro, preencha o campo!";

            ?>
        </form>
        <a href="Select.php"><button>Consultar</button></a>
        <a href="Update.php"><button>Atualizar</button></a>
        <a href="Delete.php"><button>Deletar</button></a>
    </body>
</html>