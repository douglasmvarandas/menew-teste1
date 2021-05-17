<?php

require_once('../database/database.php');

class UsuariosDAO {
    private $conn;

    public function __construct() {
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }

    public function runQuery($sql) {
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    public function add(Usuarios $Usuarios) {
      try {
        $nome = $Usuarios->getNome();
        $telefone = $Usuarios->getTelefone();
        $email = $Usuarios->getEmail();
        $cidade = $Usuarios->getCidade();
        $estado = $Usuarios->getEstado();
        $categoria = $Usuarios->getCategoria();

        $stmt = $this->conn->prepare("INSERT INTO usuarios(nome,telefone,email,cidade,estado,categoria) VALUES(:nome, :telefone, :email, :cidade, :estado, :categoria)");

        $stmt->bindparam(":nome", $nome, PDO::PARAM_STR);
        $stmt->bindparam(":telefone", $telefone, PDO::PARAM_STR);
        $stmt->bindparam(":email", $email, PDO::PARAM_STR);
        $stmt->bindparam(":cidade", $cidade, PDO::PARAM_STR);
        $stmt->bindparam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindparam(":categoria", $categoria, PDO::PARAM_STR);

        if ($stmt->execute()) {
           echo
           "<script>
               alert('Usuario cadastrado com sucesso!');
               window.location.href='../View/ViewListar.php';
           </script>";

         } else {
           echo
           "<script>
               alert('Erro ao cadastrar o Usuario!');
               window.location.href='../View/ViewListar.php';
           </script>";
         }

        }catch (PDOException $e) {
          echo $e->getMessage();
            }
        }

      public function update(Usuarios $Usuarios) {
        try{
            $id = $Usuarios->getId();
            $nome = $Usuarios->getNome();
            $telefone = $Usuarios->getTelefone();
            $email = $Usuarios->getEmail();
            $cidade = $Usuarios->getCidade();
            $estado = $Usuarios->getEstado();
            $categoria = $Usuarios->getCategoria();

            $stmt = $this->conn->prepare("UPDATE usuarios SET nome = ?, telefone = ?, email = ?, cidade = ?, estado = ?, categoria = ?  WHERE id = ?");

            $stmt->bindparam(1, $nome, PDO::PARAM_STR);
            $stmt->bindparam(2, $telefone, PDO::PARAM_STR);
            $stmt->bindparam(3, $email, PDO::PARAM_STR);
            $stmt->bindparam(4, $cidade, PDO::PARAM_STR);
            $stmt->bindparam(5, $estado, PDO::PARAM_STR);
            $stmt->bindparam(6, $categoria, PDO::PARAM_STR);
            $stmt->bindparam(7, $id, PDO::PARAM_INT);

            if ($stmt->execute()){
              echo
                  "<script>
                      alert('Dados do Usuario alterados com sucesso!');
                      window.location.href='../View/ViewListar.php';
                  </script>";

          } else {
              echo
                  "<script>
                      alert('Erro ao alterar os dados do Usuario!');
                      window.location.href='../View/ViewListar.php';
                  </script>";
          }

        } catch (PDOException $e) {
            echo $e->getMessage();
            }
        }

      public function delete(Usuarios $Usuarios) {
          try {
            $id = $Usuarios->getId();
            $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt->bindparam(1, $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
              echo
                  "<script>
                      alert('Dados do Usuario deletados com sucesso!');
                      window.location.href='../View/ViewListar.php';
                  </script>";

            } else {
              echo
                  "<script>
                      alert('Erro ao deletar os dados do Usuario!');
                      window.location.href='../View/ViewListar.php';
                  </script>";
                }

          } catch (PDOException $e) {
              echo $e->getMessage();
            }
      }

  }
