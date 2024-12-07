<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$data = $_POST['data'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];
$valor_unit_compra = $_POST['valor_unit_compra'];
$total = $_POST['total'];

$sql = "INSERT INTO compra (data, produto_id, quantidade, valor_unit_compra, total) 
VALUES ('$data', '$produto_id', '$quantidade', '$total', '$valor_unit_compra')";

if ($conn->query($sql) === TRUE) {echo "Dados salvos com sucesso!";}
else {echo "Erro ao salvar os dados";}
}

$conn->close();
?>

<form action="" method="post">

<div><label for="data">data:</label> 
<input type="date" name="data"></div>

<div><label for="produto_id">produto:</label> 
<select name="produto_id">
<?php 
include "conn.php";
$sql = "SELECT id, produto FROM produto";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='".$row['id']."'>".$row['produto']."</option>";}}
?>
</select>

<div><label for="quantidade">quantidade:</label> 
<input type="number" name="quantidade"></div>

<div><label for="valor_unit_compra">valor_unit_compra:</label> 
<input type="number" name="valor_unit_compra"></div>

<div><label for="total">total:</label> 
<input type="number" name="total"></div>

<button>Enviar</button>
</form>