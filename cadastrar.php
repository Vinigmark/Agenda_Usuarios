<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];

    // Verificar se o CPF já está cadastrado
    $sql_check_cpf = "SELECT * FROM clientes WHERE cpf = '$cpf'";
    $result_check_cpf = $conn->query($sql_check_cpf);

    if ($result_check_cpf->num_rows > 0) {
        echo "Usuário já cadastrado com este CPF.";
    } else {
        // Realizar o cadastro
        $sql = "INSERT INTO clientes (nome, email, cpf, endereco) VALUES ('$nome', '$email', '$cpf', '$endereco')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Cliente cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o cliente: " . $conn->error;
        }
    }
}
?>
