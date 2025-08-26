<?php

include '../db.php';

$sql = "SELECT * FROM autores";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Data de Criação </th>
            <th> Ações </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['nome_autor']} </td>
                <td> {$row['nacionalidade_autor']} </td>
                <td> {$row['ano_nascimento_autor']} </td>
                <td> 
                    <a href='update_autores.php?id={$row['id']}'>Editar<a>
                    <a href='delete_autores.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='create_autores.php'>Inserir novo Registro</a>";