<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $matricula = $_POST["matricula"];
    $nomeValido = 0;
    $emailValido = 0;
    $matriculaValido = 0;
    $idValido = 0;

    $id = $_POST["id"];


    if ($nome != "" and ctype_alpha($nome)) {
        $nomeValido = 1;
    }
    if ($email != "") {
        $emailValido = 1;
    }
    if ($matricula != "" and ctype_digit($matricula)) {
        $matriculaValido = 1;
    }
    if ($id != "" and ctype_digit($id)) {
        $idValido = 1;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Excluir Aluno</title>
</head>
<body>
<form action="AlterarAluno_SAMIR.php" method="post">
    <fieldset name="identificação">
        <legend>Alterar Aluno</legend><br>
        Digite a ID:<input type="text" name="id">
    </fieldset>
    <fieldset name="alteração">
        <legend>Novos dados:</legend><br>
        Nome:<input type="text" name="nome"><br><br>
        Email:<input type="text" name="email"><br><br>
        Matrícula:<input type="text" name="matricula"><br><br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($idValido == 1) {
        if ($nomeValido == 1 and $emailValido == 1 and $matriculaValido == 1) {
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $nomeBanco = "dawfaeterj";

            $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

            if ($conn->connect_error) {
                die("Não foi possível estabelecer uma conexão!" . $conn->connect_error);
            }

            $sql = "SELECT * FROM `alunos` WHERE `id`='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 0)
            {
                echo "Não existe aluno com o ID correspondente!<br>";
            }
            else
            {
              $sql = "UPDATE `alunos` SET `nome`='$nome',`email`='$email',`matrícula`='$matricula' WHERE `id`='$id'";
              mysqli_query($conn,$sql)or die("Erro ao tentar excluir registro!");
              echo "Aluno alterado com sucesso!<br>";
            }


        } else {
            echo "Preencha os dados corretamente!";
            echo "<br>";

        }

    }
    else{
    echo "Digite um ID válido!";
}

}


?>
<a href="Menu_SAMIR.html">VOLTAR</a>
</body>
</html>


