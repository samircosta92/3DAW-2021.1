<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<?php
$num1=$_GET["num1"];
$num2=$_GET["num2"];
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

if($num1Valido == 1 AND $num2Valido == 1)
{
    $resp= $num1 + $num2;
    echo "Resposta:";
    echo "<br>";
    echo "$num1 + $num2 = $resp";
}
else
{
    if($num1Valido == 0 AND $num2Valido == 1)
    {
        echo "Digite o primeiro valor corretamente!";
    }
    if($num2Valido == 0 AND $num1Valido == 1)
    {
        echo "Digite o segundo valor corretamente!";
    }
    if($num1Valido == 0 AND $num2Valido == 0)
    {
        echo "Digite os valores corretamente!";
    }

}
?>
</body>
</html>


