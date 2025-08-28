<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $emprestimo = $_POST['emprestimo'];
    $devolucao = $_POST['devolucao'];
    $livro = $_POST['livro'];
    $leitor = $_POST['leitor'];


    $sql = " INSERT INTO emprestimos (data_emprestimo,data_devolucao,id_livro,id_leitor) VALUE ('$emprestimo','$devolucao','$livro','$leitor')";

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

        <label for="emprestimo">Data do emprestimo:</label>
        <input type="date" name="emprestimo" required>

        <label for="devolucao">Data de devolução:</label>
        <input type="date" name="devolucao" required>

        <label for="livro">Id livro:</label>
        <input type="number" name="livro" required>

        <label for="leitor">Id leitor:</label>
        <input type="number" name="leitor" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read_emprestimos.php">Ver registros.</a>

</body>

</html>