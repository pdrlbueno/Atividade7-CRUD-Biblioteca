<?php

include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE leitores SET nome_leitor ='$nome',email_leitor ='$email',telefone_leitor = '$telefone' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read_leitores.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit();
}

$sql = "SELECT * FROM leitores WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="update_leitores.php?id=<?php echo $row['id']; ?>">

        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="number" name="telefone" value="<?php echo $row['telefone']; ?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read_leitores.php">Ver registros.</a>

</body>

</html>