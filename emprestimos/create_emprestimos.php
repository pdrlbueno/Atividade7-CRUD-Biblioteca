<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['name'];
    $nacionalidade = $_POST['nacionalidade'];
    $nascimnto = $_POST['nascimento'];

    $sql = " INSERT INTO autores (nome_autor,nacionalidade_autor,ano_nascimento_autor) VALUE ('$nome','$nacionalidade','$nascimnto')";

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

    <form method="POST" action="create_emprestimos.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" required>

        <label for="nascimento">Ano de nascimento:</label>
        <input type="number" name="nascimento" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read_emprestimos.php">Ver registros.</a>

</body>

</html>