<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "usuario";

// Estabelece a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
