<?php

include '../db.php';

$sql = "SELECT * FROM leitores";

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
                <td> {$row['nome_leitor']} </td>
                <td> {$row['email_leitor']} </td>
                <td> {$row['telefone_leitor']} </td>
                <td> 
                    <a href='update_leitores.php?id={$row['id']}'>Editar<a>
                    <a href='delete_leitores.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='create_leitores.php'>Inserir novo Registro</a>";