<?php

include('connect.php');

$sql = "SELECT * FROM `agenda` ORDER BY 'idcadastro'";
$result = mysqli_query($connect, $sql) or die($mysqli->error);

//verificação

if (($result) AND ($result -> num_rows !=0)){
    
    while($row_sql = mysqli_fetch_assoc($result)){    
       echo"<tr>
                <td>". $row_sql['idcadastro'] ."</td>";
            echo"<td>". $row_sql['nome'] ."</td>";
            echo"<td>". $row_sql['telefone'] ."</td>";
            echo"<td>". $row_sql['email'] ."</td>";
            echo"<td>". $row_sql['cidade'] ."</td>";
            echo"<td>". $row_sql['estado'] ."</td>";
            echo"<td>". $row_sql['categoria'] ."</td>";
            echo"<td>
                        <a href ='index.php'?edit=". $row_sql['idcadastro'] ." class = 'btn btn-info'>Editar
                    </td>";
            echo"<td>
                    <a href ='index.php'?delete=". $row_sql['idcadastro'] ." class = 'btn btn-danger'>Deletar
                </td>
            </tr>";
    }


}else{
    echo "Nenhum resultado encontrado";
}
mysqli_close($connect);

?>