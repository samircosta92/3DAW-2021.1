<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $matricula = $_POST["matricula"];
    $nomeValido = 0;
    $emailValido = 0;
    $matriculaValido = 0;

    if ($nome != "" and ctype_alpha($nome)) {
        $nomeValido = 1;
    }
    if ($email != "") {
        $emailValido = 1;
    }
    if ($matricula != "" and ctype_digit($matricula)) {
        $matriculaValido = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Aluno</title>
</head>
<body>
<form action="IncluirAluno_SAMIR.php" method="post">
    <fieldset name="identificação">
        <legend>Incluir Aluno</legend><br>
        Nome:<input type="text" name="nome"><br><br>
        Email:<input type="text" name="email"><br><br>
        Matrícula:<input type="text" name="matricula"><br><br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>
<a href="Menu_SAMIR.html">VOLTAR</a>
<br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ($nomeValido == 1 and $emailValido == 1 and $matriculaValido == 1)
    {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "dawfaeterj";

        $conn = new mysqli($servidor,$usuario,$senha,$nomeBanco);

        if($conn->connect_error)
        {
            die("Não foi possível estabelecer uma conexão!".$conn->connect_error);
        }

        $sql = "INSERT INTO `alunos`(`nome`, `email`, `matrícula`) VALUES ('$nome','$email','$matricula')";


        if ($conn->query($sql) === TRUE)
        {
            echo "Aluno,$nome, inserido com sucesso!";

        }
        else {

            echo "Erro ao inserir aluno!";
        }
    }

    else
    {
        echo "Preencha os dados corretamente!";
        echo "<br>";

    }

}

?>
</body>
</html>
