<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $csv = $_POST["csv"];
    $csvValido = 0;

    if ($csv != "") {
        $csvValido = 1;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Aluno por Arquivo</title>
</head>
<body>
<form action="IncluirAlunoArquivo_SAMIR.php" method="post">
    <fieldset name="identificação">
        <legend>Incluir Alunos por Arquivo</legend><br>
        Digite o nome do arquivo:<input type="text" name="csv"><br><br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>
<a href="Menu_SAMIR.html">VOLTAR</a>
<br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ($csvValido == 1)
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

        $arquivo = fopen($csv,'r');


        fgetcsv($arquivo,1000,";");//para ignorar a linha do cabeçalho

        while($dados = fgetcsv($arquivo,1000,";"))
        {

            $nome = $dados[0];
            $email = $dados[1];
            $matricula = $dados[2];


            $result = $conn->query("INSERT INTO `alunos`(`nome`, `email`, `matrícula`) VALUES ('$nome','$email','$matricula')");
        }

        if($result===TRUE)
        {
            echo "Alunos inseridos com sucesso";
        }
        else{
            echo "Não foi possível inserir os alunos via arquivo";
        }

    }

    else
    {
        echo "Preencha o nome do arquivo corretamente!";
        echo "<br>";

    }

}

?>
</body>
</html>

