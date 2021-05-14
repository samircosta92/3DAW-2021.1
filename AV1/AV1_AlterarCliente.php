<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $idValido = 0;
    $nomeValido = 0;
    $cpfValido = 0;
    $enderecoValido = 0;
    $cepValido = 0;
    $cidadeValido = 0;
    $estadoValido = 0;


    if ($id != "" and ctype_digit($id))
    {
        $idValido = 1;
    }
    if ($nome != "" and ctype_alpha(str_replace(' ', '',$nome)))
    {
        $nomeValido = 1;
    }
    if ($cpf != "" and ctype_digit($cpf))
    {
        $cpfValido = 1;
    }
    if ($endereco != "")
    {
        $enderecoValido = 1;
    }
    if ($cep != "" and ctype_digit($cep))
    {
        $cepValido = 1;
    }
    if ($cidade != "" and ctype_alpha(str_replace(' ', '',$cidade)))
    {
        $cidadeValido = 1;
    }
    if ($estado != "" and ctype_alpha(str_replace(' ', '',$estado)))
    {
        $estadoValido = 1;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alterar Cliente</title>
</head>
<body>
<form action="AV1_AlterarCliente.php" method="post">
    <fieldset name="identificação">
        <legend>Alterar Cliente</legend><br>
        Digite a ID:<input type="text" name="id">
    </fieldset>
    <fieldset name="alteração">
        <legend>Novos dados:</legend><br>
        Nome:<input type="text" name="nome"><br><br>
        CPF:<input type="text" name="cpf"><br><br>
        Endereço:<input type="text" name="endereco"><br><br>
        CEP:<input type="text" name="cep"><br><br>
        Cidade:<input type="text" name="cidade"><br><br>
        Estado:<input type="text" name="estado"><br><br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($idValido == 1)
    {
        if ($nomeValido==1 and $cpfValido==1 and $enderecoValido==1 and $cepValido==1 and $cidadeValido==1 and $estadoValido==1)
        {
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $nomeBanco = "dawfaeterj";

            $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

            if ($conn->connect_error) {
                die("Não foi possível estabelecer uma conexão!" . $conn->connect_error);
            }

            $sql = "SELECT * FROM `clientes` WHERE `id`='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 0)
            {
                echo "Não existe cliente com o ID correspondente!<br>";
            }
            else
            {
                $sql = "UPDATE `clientes` SET `nome`='$nome',`cpf`='$cpf',`endereco`='$endereco',`cep`='$cep',`cidade`='$cidade',`estado`='$estado' WHERE `id`='$id'";
                 mysqli_query($conn,$sql)or die("Erro ao tentar excluir registro!");
                 echo "Cliente alterado com sucesso!<br>";
            }


        } else {
            echo "Preencha os dados corretamente!";
            echo "<br>";

        }

    }
    else{
    echo "Digite um ID válido!<br>";
}

}


?>
<a href="AV1_Menu.html">VOLTAR</a>
</body>
</html>


