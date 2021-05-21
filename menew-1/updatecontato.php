<?php
    include ('connect/connect.php');

    $id = $_GET['id'];

   $data = [
		'Nome'      => $_POST['Nome'],
	    'Telefone'  => $_POST['Telefone'],
	    'Email'     => $_POST['Email'],
	    'Cidade'    => $_POST['Cidade'],
	    'Estado'    => $_POST['Estado'],
        'Categoria' => $_POST['Categoria']
	];

     $sql = "UPDATE contato SET Nome        = :Nome,
                                Telefone    = :Telefone,
                                Email       = :Email,
                                Cidade      = :Cidade,
                                Estado      = :Estado,
                                Categoria   = :Categoria WHERE Id = '$id' ";

	$stmt = $conn->prepare($sql);
	$stmt->execute($data);

?>
<<meta http-equiv="refresh" content="0;url=index.php">