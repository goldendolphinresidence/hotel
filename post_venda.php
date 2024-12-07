<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$data_venda = $_POST['data_venda'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];
$valor_unit_venda = $_POST['valor_unit_venda'];
$total = $_POST['total'];

$sql = "INSERT INTO venda (data_venda, produto_id, quantidade, valor_unit_venda, total) 
VALUES ('$data_venda', '$produto_id', '$quantidade', '$valor_unit_venda', '$total')";

if ($conn->query($sql) === TRUE) {echo "Dados salvos com sucesso!";}
else {echo "Erro ao salvar os dados";}
}

$conn->close();
?>

<form action="" method="post">

<div><label for="data_venda">data_venda:</label> 
<input type="date" name="data_venda"></div>









<select name="produto" id="getValueId" onchange="getValueFunction()">
<option value="">Selecione um produto</option>
<?php
include "conn.php";
$sql = "SELECT produto, valor_unit_venda FROM produto";
$result = $conn->query($sql);
if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) {
echo "<option value='".$row['valor_unit_venda']."'>".$row['produto']."</option>"; } }
?>
</select>

<input type="number" name="valor_unit_venda" id="getValueInputId" readonly>

<script>
function getValueFunction() {
const select = document.getElementById("getValueId");
const valueRecorded = select.value;
document.getElementById("getValueInputId").value = valueRecorded;}
</script>












<div><label for="quantidade">quantidade:</label> 
<input type="number" name="quantidade"></div>

<div><label for="preco">preco:</label> 
<input type="number" name="preco"></div>

<div><label for="total">total:</label> 
<input type="number" name="total"></div>

<button>Enviar</button>
</form>


<script>
function updateValor_unit_venda(value) {
const dadosMap = {
<?php
include "conn.php";
$sql = "SELECT produto, valor_unit_venda FROM produto";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {echo "\"" . $row['produto'] . "\": \"" . $row['valor_unit_venda'] . "\",";}}
?>
};
document.getElementById('valor_unit_venda').value = dadosMap[value] || '';}
</script>