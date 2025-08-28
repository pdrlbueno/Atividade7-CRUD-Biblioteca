<?php

include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $genero = $_POST['genero'];
    $publicacao = $_POST['publicacao'];
    $autor = $_POST['autor'];


    $sql = "UPDATE livros SET genero_livro ='$genero',ano_publicacao_livro ='$publicacao',id_autor = '$autor' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read_autores.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM livros WHERE id=$id";
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

    <form method="POST" action="update_livros.php?id=<?php echo $row['id'];?>">

          <label for="genero">Gênero:</label>
        <input type="text" name="genero" value="<?php echo $row['name'];?>" required>

        <label for="publicacao">Ano de publicação:</label>
        <input type="number" name="publicacao" value="<?php echo $row['nacionalidade'];?>" required>

         <label for="autor">Id do autor:</label>
        <input type="number" name="autor" value="<?php echo $row['nascimento'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read_livros.php">Ver registros.</a>

</body>

</html>