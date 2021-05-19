<?php
//chamando função para conectar no banco
include('connect.php');

$sql = "SELECT * FROM `agenda` ORDER BY 'idcadastro'";
$result = mysqli_query($connect, $sql) or die($mysqli->error);

//verificando se tem algum registro

if (($result) AND ($result -> num_rows !=0)){
    
    //loop para listar registros
    while($row_sql = mysqli_fetch_assoc($result)){    
       echo"<tr>
                <td>". $row_sql['idcadastro'] ."</td>";
            echo"<td>". $row_sql['nome'] ."</td>";
            echo"<td>". $row_sql['telefone'] ."</td>";
            echo"<td>". $row_sql['email'] ."</td>";
            echo"<td>". $row_sql['cidade'] ."</td>";
            echo"<td>". $row_sql['estado'] ."</td>";
            echo"<td>". $row_sql['categoria'] ."</td>";
            
            //botão para editar os registros redirecionando para o 'atualiza.php'
            echo"<td>
                    <a href ='atualiza.php?edit= {$row_sql['idcadastro']}' class = 'btn btn-info'>Editar
                    </td>";
    }


}else{
    //exibindo aviso caso não haja registros
    echo " <h1> alert('Nenhum registro encontrado')</h1>";
}
//fechando conexão com o banco
mysqli_close($connect);

?>