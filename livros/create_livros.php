<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $genero = $_POST['genero'];
    $publicacao = $_POST['publicacao'];
    $autor = $_POST['autor'];

    $sql = " INSERT INTO livros (genero_livro,ano_publicacao_livro,id_autor) VALUE ('$genero','$publicacao','$autor')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="create_livros.php">

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" required>

        <label for="publicacao">Ano de publicação:</label>
        <input type="number" name="publicacao" required>

        <label for="autor">Id do autor:</label>
        <input type="number" name="autor" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read_livros.php">Ver registros.</a>

</body>

</html>