<?php

include('connect.php');

$sql = "SELECT * FROM `agenda` ORDER BY 'idcadastro'";
$result = mysqli_query($connect, $sql) or die($mysqli->error);

//verificação

if (($result) AND ($result -> num_rows !=0)){
    
    while($row_sql = mysqli_fetch_assoc($result)){    
        echo "ID: " . $row_sql ['idcadastro'] . "  ";
        echo " | Nome: " . $row_sql ['nome'] . "  ";    
        echo " | Telefone:" . $row_sql ['telefone'] . "  ";    
        echo " | E-mail: " . $row_sql ['email'] . "  ";    
        echo " | Cidade: " . $row_sql ['cidade'] . "  ";    
        echo " | Estado: " . $row_sql ['estado'] . "  ";    
        echo " | Categoria: " . $row_sql ['categoria'] . "<br><br>";        
        }


}else{
    echo "Nenhum resultado encontrado";
}
mysqli_close($connect);

?>