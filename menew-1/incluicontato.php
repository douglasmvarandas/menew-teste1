<?php
    include ('connect/connect.php');
	include 'kj.php';

   $data = [
		'Id'        => '',
		'Nome'      => $_POST['Nome'],
	    'Telefone'  => $_POST['Telefone'],
	    'Email'     => $_POST['Email'],
	    'Cidade'    => $_POST['Cidade'],
	    'Estado'    => $_POST['Estado'],
        'Categoria' => $_POST['Categoria']
	];

    $sql = "INSERT INTO contato (Id, Nome, Telefone, Email, Cidade, Estado, Categoria) VALUES (:Id, :Nome, :Telefone, :Email, :Cidade, :Estado, :Categoria)";

	$stmt = $conn->prepare($sql);
	$stmt->execute($data);

?>
<meta http-equiv="refresh" content="0;url=index.php?id=1">