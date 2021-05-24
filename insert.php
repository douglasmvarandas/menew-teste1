  <?php
               include "conn.php";

               $nome = $_POST['nome'];
               $telefone = $_POST['telefone'];
               $email = $_POST['email'];
               $cidade = $_POST['cidade'];
               $estado = $_POST['estado'];
               $categoria = $_POST['categoria'];

               $sql = "INSERT INTO `registros` ( `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES ('$nome','$telefone','$email','$cidade','$estado','$categoria')";
            
               if (mysqli_query($conn, $sql)) {
                    echo "<script>window.location='cadastro.php';alert('Tudo certo! $nome foi cadastrado com sucesso!');</script>";
                    
} else {
                    echo "<script>window.location='cadastro.php';alert('ERRO! Não foi possivel realizar o cadastro de $nome.');</script>";

                    
}
mysqli_close($conn);

  ?>