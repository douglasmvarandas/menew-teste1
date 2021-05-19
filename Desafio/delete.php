<?php

include('connect.php');

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $sqldelete = "DELETE * FROM agenda WHERE idcadastro = $id";
    $result = mysqli_query($connect, $sqldelete);
    if (($result) AND ($result -> num_rows !=0)){
        echo "Deletado com sucesso";
    }else{
        echo"Não foi Possível deletar";
    }
}
echo $id.",". $sqldelete;

?>