<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $idValido = 0;

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
<form action="ExcluirAluno_SAMIR.php" method="post">
    <fieldset name="identificação">
        <legend>Excluir Aluno</legend><br>
        Digite a ID:<input type="text" name="id">
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "dawfaeterj";

    if ($idValido == 1) {
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
            $sql = "DELETE FROM `alunos` WHERE `id`='$id'";
            mysqli_query($conn,$sql) or die("Erro ao tentar excluir registro!");
            echo "Aluno excluído com sucesso!<br>";
        }

    } else {
        echo "Digite um ID Válido!<br>";
    }
}
?>
<a href="Menu_SAMIR.html">VOLTAR</a>
</body>
</html>
