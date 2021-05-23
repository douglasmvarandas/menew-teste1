<?php
    session_start();
    require_once('database/dbConnect.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

	$id = $_GET['id'];
    $consulta = "DELETE FROM agendars WHERE id = $id";
    $deletarAgendamento = mysqli_query($link, $consulta);
    // $deletarAgenda = mysqli_fetch_assoc($deletarAgendamento);

    if(mysqli_affected_rows($link)){
        $_SESSION['msg'] = "<p style='color:green;'> Usuario editado com Sucesso! </p>";
        header("Location: pesquisar.php");
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'> Erro Ao editar Usuario! </p>";
        header("Location: pesquisar.php");
    }

?>