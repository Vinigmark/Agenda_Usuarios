<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .container {
            max-width: 800px; /*800px*/
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .btn-editar,
        .btn-excluir {
            padding: 5px 10px;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-editar {
            background-color: #28a745;
            margin-right: 5px;
        }

        .btn-excluir {
            background-color: #dc3545;
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
        <h1>Lista de Clientes</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
            <?php
            require_once "conexao.php";
            $sql = "SELECT * FROM clientes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["cpf"] . "</td>";
                    echo "<td>" . $row["endereco"] . "</td>";
                    echo "<td>";
                    echo "<a class='btn-editar' href='editar.php?id=" . $row["id"] . "'>Editar</a>";
                    echo "<a class='btn-excluir' href='excluir.php?id=" . $row["id"] . "'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum cliente cadastrado.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <a class= "btn" href="index.php">CADASTRO</a>
    </div>
</body>
</html>
