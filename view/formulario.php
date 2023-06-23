<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Formulário de Cadastro</title>
</head>

<body>
    <h1>Formulário de Cadastro</h1>

    <form action="cadastrar.php" method="post">
        <label>Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br>

        <label>Fabricante/Montadora:</label>
        <input type="text" id="fabricante" name="fabricante" required><br>

        <label>Ano de Fabricação:</label>
        <input type="number" id="ano" name="ano" required><br>

        <label>Preço:</label>
        <input type="number" id="preco" name="preco" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>