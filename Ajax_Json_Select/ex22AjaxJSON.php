<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["estado"];
    echo '{"cidades":["Rio de Janeiro", "Angra", "Caxias"]}';

}
?>