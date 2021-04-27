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
    $sql = "SELECT * FROM `alunos` WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($linha = $result->fetch_assoc())
        {
            echo "id: " . $linha["id"]."|".
                " Nome: ". $linha["nome"]."|".
                " Email: " . $linha["email"]."|".
                " Matrícula: ".$linha["matrícula"];
            echo "<br>";
            echo "-------------------------------------------------------------------------------------------------";
            echo  "<br>";
        }
    }
    else{
        echo "Lista vazia!";
    }



?>
<html><a href="Menu_SAMIR.html">VOLTAR</a></html>
