<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM clientes WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Erro ao excluir o cliente: " . $conn->error;
    }
}

$conn->close();
header("Location: listar.php");
?>
