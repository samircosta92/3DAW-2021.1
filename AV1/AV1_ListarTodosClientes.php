<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "dawfaeterj";
    $conn = new mysqli($servidor,$usuario,$senha,$nomeBanco);

    if($conn->connect_error)
    {
        die("Não foi possível estabelecer uma conexão!".$conn->connect_error);
    }
    $sql = "SELECT * FROM `clientes` WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($linha = $result->fetch_assoc())
        {
            echo "id: " . $linha["id"]."|".
                " Nome: ". $linha["nome"]."|".
                " CPF: " . $linha["cpf"]."|".
                " Endereço: ".$linha["endereco"]."|".
                " CEP: ".$linha["cep"]."|".
                " Cidade: ".$linha["cidade"]."|".
                " Estado: ".$linha["estado"];

            echo "<br>";
            echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
            echo  "<br>";
        }
    }
    else{
        echo "Tabela vazia!";
    }



?>
<html><a href="AV1_Menu.html">VOLTAR</a></html>
