<?php

class Usuarios {
  private $id;
  private $nome;
  private $telefone;
  private $email;
  private $cidade;
  private $estado;
  private $categoria;

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
      return $this;
    }

    public function getNome() {
      return $this->nome;
    }

    public function setNome($nome) {
      $this->nome = $nome;
      return $this;
    }

    public function getTelefone() {
      return $this->telefone;
    }

    public function setTelefone($telefone) {
      $this->telefone = $telefone;
      return $this;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setEmail($email) {
      $this->email = $email;
      return $this;
    }

    public function getCidade() {
      return $this->cidade;
    }

    public function setCidade($cidade) {
      $this->cidade = $cidade;
      return $this;
    }

    public function getEstado() {
      return $this->estado;
    }

    public function setEstado($estado) {
       $this->estado = $estado;
			 return $this;
    }

    public function setCategoria($categoria)  {
      $this->categoria= $categoria;
      return $this;
    }

    public function getCategoria(){
      return $this->categoria;
    }

  }
