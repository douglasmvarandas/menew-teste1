<?php
    include ('connect/connect.php');

    $id = $_GET['id'];

    $consulta = "DELETE FROM contato WHERE Id = $id";
    $result = $conn -> query($consulta);

?>
<<meta http-equiv="refresh" content="0;url=index.php?id=2">