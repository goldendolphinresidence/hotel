<?php
$conn = mysqli_connect("localhost", "u650820093_hotel", "Hotel15058181", "u650820093_hotel");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_venda = $_POST['data_venda'];
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $total = $_POST['total'];

    // Inserir a venda na tabela `venda`
    $sql = "INSERT INTO venda (data_venda, produto_id, quantidade, preco, total) 
            VALUES ('$data_venda', '$produto_id', '$quantidade', '$preco', '$total')";

    if ($conn->query($sql) === TRUE) {
 
        // Dar baixa no estoque do produto
        $sql_update_estoque = "UPDATE produto SET estoque = estoque - $quantidade WHERE id = $produto_id";
        
        if ($conn->query($sql_update_estoque) === TRUE) {
            echo "Venda registrada e estoque atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o estoque: " . $conn->error;
        }
    } else {
        echo "Erro ao registrar a venda: " . $conn->error;
    }
}

$conn->close();
?>

<form action="" method="post">

    <div><label for="data_venda">Data da Venda:</label> 
    <input type="date" name="data_venda" required></div>

    <div><label for="produto_id">ID do Produto:</label> 
    <input type="number" name="produto_id" required></div>

    <div><label for="quantidade">Quantidade:</label> 
    <input type="number" name="quantidade" required></div>

    <div><label for="preco">Preço Unitário:</label> 
    <input type="number" step="0.01" name="preco" required></div>

    <div><label for="total">Total:</label> 
    <input type="number" step="0.01" name="total" required></div>

    <button>Enviar</button>
</form>
