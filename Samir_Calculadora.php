<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $num1=$_POST["num1"];
    $num2=$_POST["num2"];
    $op = $_POST["op"];
    $num1Valido = 0;
    $num2Valido = 0;

    if($num1 !="" AND ctype_digit($num1))
    {
        $num1Valido = 1;
    }
    if($num2 !="" AND ctype_digit($num2))
    {
        $num2Valido = 1;
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <style>
        form{
            padding-top:20px;
            padding-bottom:20px;
            text-align:center;
            font-size:20px;
            color:red;
            background:black;
        }
    </style>
</head>
<body>
<form action="Samir_Calculadora_V2.0.php" method="post">
    <fieldset name="calculadora">
        <legend>Calculadora:</legend><br>
        Primeiro valor:<input type="text" name="num1"><br><br>
        Segundo valor:<input type=text" name="num2"><br><br>
        Operação: <br><input type="radio" name="op" value="soma" checked>Soma (+)
        <input type="radio" name="op" value="subt">Subtração (-)<br>
        <input type="radio" name="op" value="mult">Multiplicação (x)
        <input type="radio" name="op" value="div">Divisão (/)<br>
        <input type="radio" name="op" value="pot">Potência
        <input type="radio" name="op" value="perc">Porcentagem (%)<br>
        <input type="radio" name="op" value="inverso">1/X (Para o primeiro valor)<br>
        <input type="radio" name="op" value="quadrado">X² (Para o primeiro valor)<br>
        <input type="radio" name="op" value="raiz">√X (Para o primeiro valor)<br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(($op == "inverso" or $op == "quadrado" or $op == "raiz") and $num1Valido == 1)
    {
        if($op == "inverso")
        {

            if($num1 == 0)
            {
                echo "<h2>Não é possível dividir por 0!</h2>";
            }
            else {
                $resp = 1/$num1;
                echo "<br>";
                echo "<h2>1/$num1 = $resp</h2>";
            }
        }
        if($op == "quadrado")
        {
            $resp = $num1*$num1;
            echo "<br>";
            echo "<h2>$num1 ² = $resp</h2>";

        }
        if($op == "raiz")
        {
            $resp = sqrt($num1);
            echo "<br>";
            echo "<h2>√$num1 = $resp</h2>";

        }
    }
    else
    if ($num1Valido == 1 and $num2Valido == 1)
    {
        if($op == "soma")
        {
            $resp = $num1 + $num2;
            echo "<br>";
            echo "<h2>$num1 + $num2 = $resp</h2>";
        }

        if($op == "subt")
        {
            $resp = $num1 - $num2;
            echo "<br>";
            echo "<h2>$num1 - $num2 = $resp</h2>";
        }

        if($op == "mult")
        {
            $resp = $num1*$num2;
            echo "<br>";
            echo "<h2>$num1 x $num2 = $resp</h2>";
        }

        if($op == "div")
        {
            if ($num2 == 0) {
                echo "<h2>Não é possível dividir por 0!</h2>";
            } else {
                $resp = $num1 / $num2;
                echo "<br>";
                echo "<h2>$num1 / $num2 = $resp</h2>";
            }
        }

        if($op == "pot")
        {
            $resp = pow($num1,$num2);
            echo "<br>";
            echo "<h2>$num1 ^ $num2 = $resp</h2>";

        }
        if($op == "perc")
        {
            $resp = $num1*($num2/100);
            echo "<br>";
            echo "<h2>$num2% de $num1 = $resp</h2>";

        }


    }
    else
        {
        if ($num1Valido == 0 and $num2Valido == 1) {
            echo "<h2>Digite o primeiro valor corretamente!</h2>";
        }
        if ($num2Valido == 0 and $num1Valido == 1) {
            echo "<h2>Digite o segundo valor corretamente!</h2>";
        }
        if ($num1Valido == 0 and $num2Valido == 0) {
            echo "<h2>Digite os valores corretamente!</h2>";
        }

    }
}
?>
</body>
</html>
