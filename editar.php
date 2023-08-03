<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            font-size: 16px;
            margin-top: 10px;
            color: #007bff;
        }

        .error {
            color: #ff0000;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }

        /* Responsivo */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Editar Cliente</h1>
        <?php
        require_once "conexao.php";

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM clientes WHERE id = $id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Cliente não encontrado.";
                exit;
            }
        } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["cpf"];
            $endereco = $_POST["endereco"];

            $sql = "UPDATE clientes SET nome = '$nome', email = '$email', cpf = '$cpf', endereco = '$endereco' WHERE id = $id";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='message'>Cliente atualizado com sucesso!</div>";
                // Atualiza a variável $row para refletir os novos dados após a atualização
                $row = [
                    "id" => $id,
                    "nome" => $nome,
                    "email" => $email,
                    "cpf" => $cpf,
                    "endereco" => $endereco
                ];
            } else {
                echo "<div class='error'>Erro ao atualizar o cliente: " . $conn->error . "</div>";
            }
        } else {
            echo "ID de cliente inválido.";
            exit;
        }
        ?>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $row["nome"]; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $row["email"]; ?>" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="<?php echo $row["cpf"]; ?>" required>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="<?php echo $row["endereco"]; ?>" required>

            <input type="submit" value="Salvar">
        </form>
        <a class="btn" href="listar.php">Lista_Clientes</a>
    </div>
</body>
</html>