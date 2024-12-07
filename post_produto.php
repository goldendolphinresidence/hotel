<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$produto = $_POST['produto'];
$valor_unit_venda = $_POST['valor_unit_venda'];

$sql = "INSERT INTO produto (produto, valor_unit_venda) 
VALUES ('$produto', '$valor_unit_venda')";

if ($conn->query($sql) === TRUE) {echo "Dados salvos com sucesso!";}
else {echo "Erro ao salvar os dados";}
}

$conn->close();
?>

<form action="" method="post">

<div><label for="descricao">produto:</label> 
<input type="text" name="produto"></div>

<div><label for="valor_unit_venda">valor_unit_venda:</label> 
<input type="number" name="valor_unit_venda"></div>

<button>Enviar</button>
</form>