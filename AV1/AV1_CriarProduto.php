<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fileDirectory = "uploads/";
    $fileName = $fileDirectory . basename($_FILES["nomeArquivo"]["name"]);
    $csvFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $uploadValido = 0;


        if (file_exists($fileName))
        {
            echo "Arquivo " . $_FILES["nomeArquivo"]["name"] . " já gravado na pasta uploads.<br> ";
            echo "Este arquivo já foi utilizado anteriormente, selecione outro arquivo!<br><br>";
        }
        elseif ($csvFileType != "csv")
        {
            echo "Extensão " . $csvFileType . " do arquivo " . $_FILES["nomeArquivo"]["name"] . " não é permitida. Apenas extensão .csv<br><br>";
        } else {
            move_uploaded_file($_FILES["nomeArquivo"]["tmp_name"], $fileName);
            echo "Arquivo gravado em: " . $fileName . "<br><br>";
            $uploadValido = 1;
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Produtos por Arquivo</title>
</head>
<body>
<form action="AV1_CriarProduto.php" method="post" enctype="multipart/form-data">
    <fieldset name="identificação">
        <legend>Incluir Produtos por Arquivo</legend><br>
        Selecione o arquivo:<input type="file" name="nomeArquivo"><br><br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ($uploadValido == 1)
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

        $arquivo = fopen($_FILES["nomeArquivo"]["name"],'r');


        fgetcsv($arquivo,1000,";");//para ignorar a linha do cabeçalho

        while($dados = fgetcsv($arquivo,1000,";"))
        {

            $nome = $dados[0];
            $descricao = $dados[1];
            $preco = $dados[2];
            $quantidade = $dados[3];
            $peso = $dados[4];


            $result = $conn->query("INSERT INTO `produtos`(`nome`, `descricao`, `preco`, `quantidade`, `peso`) VALUES ('$nome','$descricao','$preco','$quantidade','$peso')");
        }

        if($result===TRUE)
        {
            echo "Produtos inseridos com sucesso!<br>";
        }
        else{
            echo "Não foi possível inserir os produtos via arquivo<br>";
        }

    }


}

?>
</body>
<a href="AV1_Menu.html">VOLTAR</a>

</html>

