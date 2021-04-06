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
<form action="Samir_Calculadora.php" method="post">
    <fieldset name="calculadora">
        <legend>Calculadora:</legend><br>
        Primeiro valor:<input type="text" name="num1"><br><br>
        Segundo valor:<input type=text" name="num2"><br><br>
        Operação: <br><input type="radio" name="op" value="soma" checked>Soma<br>
        <input type="radio" name="op" value="subt">Subtração<br>
        <input type="radio" name="op" value="mult">Multiplicação<br>
        <input type="radio" name="op" value="div">Divisão<br>
        <input type="radio" name="op" value="pot">Potência<br>
        <input type="submit" value="ENVIAR">
    </fieldset>
</form>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

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
            $resp = $num1/$num2;
            echo "<br>";
            echo "<h2>$num1 / $num2 = $resp</h2>";
        }

        if($op == "pot")
        {
            $resp = pow($num1,$num2);
            echo "<br>";
            echo "<h2>$num1 ^ $num2 = $resp</h2>";

        }
    }
    else {
        if ($num1Valido == 0 and $num2Valido == 1) {
            echo "Digite o primeiro valor corretamente!";
        }
        if ($num2Valido == 0 and $num1Valido == 1) {
            echo "Digite o segundo valor corretamente!";
        }
        if ($num1Valido == 0 and $num2Valido == 0) {
            echo "Digite os valores corretamente!";
        }

    }
}
?>
</body>
</html>
