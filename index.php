<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Clientes</title>
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

        a{
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
        <h1>Cadastro de Clientes</h1>
        <form id="cadastro-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu email" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required placeholder="xxx.xxx.xxx-xx" maxlength="14">

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço" required>

            <input type="submit" value="Cadastrar">
        </form>
        <div class="message" id="message"></div>

        <a class="btn" href="listar.php">Ver Lista de Clientes</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cadastro-form").submit(function(e) {
                e.preventDefault(); 
                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: "cadastrar.php",
                    data: form.serialize(),
                    success: function(response) {
                        $("#message").text(response);
                        form[0].reset();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    const cpfInput = document.getElementById("cpf");

    cpfInput.addEventListener("input", function (event) {
    let value = event.target.value;

    // Remove tudo que não é dígito
    value = value.replace(/\D/g, "");

    // Aplica a máscara "111.111.111-11"
    value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, "$1.$2.$3-$4");

    // Atualiza o valor no campo
    event.target.value = value;
});
    </script>
</body>
</html>
