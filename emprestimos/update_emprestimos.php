<?php

include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $emprestimo = $_POST['emprestimo'];
    $devolucao = $_POST['devolucao'];
    $livro = $_POST['livro'];
    $leitor = $_POST['leitor'];


    $sql = "UPDATE emprestimos SET data_emprestimo ='$emprestimo',data_devolucao ='$devolucao',id_livro = '$livro', id_leitor = '$leitor' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read_emprestimos.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM emprestimos WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="update_emprestimos.php?id=<?php echo $row['id'];?>">

        <label for="emprestimo">Data do emprestimo:</label>
        <input type="date" name="emprestimo" value="<?php echo $row['name'];?>" required>

        <label for="devolucao">Data de devolução:</label>
        <input type="date" name="devolucao" value="<?php echo $row['nacionalidade'];?>" required>

        <label for="livro">Id livro:</label>
        <input type="number" name="livro" value="<?php echo $row['nascimento'];?>" required>

        <label for="leitor">Id leitor:</label>
        <input type="number" name="leitor" value="<?php echo $row['nascimento'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read_emprestimos.php">Ver registros.</a>

</body>

</html>