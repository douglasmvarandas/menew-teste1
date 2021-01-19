<?php

include "./DAO/DAOConexao.php";

$consulta = filter_input(INPUT_GET,'consulta');

if($consulta){
    $sql = mysqli_query($conexao, "select * from tbclientes where NOME like'%$consulta%'");
}else{

$sql = mysqli_query($conexao, "select * from tbclientes");
}
while ($vetor = mysqli_fetch_array($sql)) :

    $id = $vetor['ID'];
    $nome = $vetor['NOME'];
    $email = $vetor['EMAIL'];
    $telefone = $vetor['TELEFONE'];
    $cidade = $vetor['CIDADE'];
    $estado = $vetor['ESTADO'];
    $categoria = $vetor['CATEGORIA'];
   
    echo "<tr>";
        echo "    "
    . "<td clas='actions'>  <a href='./viewupdate.php?id=$id' class='btn btn-info'>Editar</a>&nbsp<a href='./DAO/DAODelete.php?id=$id' onclick='return confirm('Tem certeza que deseja deletar este registro?')' class='btn btn-danger'>Excluir</a</td>"
                . "<td>$id</td><td>$nome</td><td>$telefone</td><td>$email</td><td>$categoria</td><td>$cidade</td><td>$estado</td>
        ";
    echo"</tr>";
endwhile;
    
    
 
    


