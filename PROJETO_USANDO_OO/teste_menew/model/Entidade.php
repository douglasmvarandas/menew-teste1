<?php

    require_once '../repository/EntidadeRepository.php';
    
    class Entidade extends EntidadeRepository {

        private $idEntidade;
        private $nome;
        private $telefone;
        private $email;
        private $cidade;
        private $estado;
        private $categoria;
        private $ativo;
        
        function getNome() {
            return $this->nome;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function getEmail() {
            return $this->email;
        }

        function getCidade() {
            return $this->cidade;
        }

        function getEstado() {
            return $this->estado;
        }

        function getCategoria() {
            return $this->categoria;
        }

        function setNome($nome): void {
            $this->nome = $nome;
        }

        function setTelefone($telefone): void {
            $this->telefone = $telefone;
        }

        function setEmail($email): void {
            $this->email = $email;
        }

        function setCidade($cidade): void {
            $this->cidade = $cidade;
        }

        function setEstado($estado): void {
            $this->estado = $estado;
        }

        function setCategoria($categoria): void {
            $this->categoria = $categoria;
        }
        function getIdEntidade() {
            return $this->idEntidade;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setIdEntidade($idEntidade): void {
            $this->idEntidade = $idEntidade;
        }

        function setAtivo($ativo): void {
            $this->ativo = $ativo;
        }

        public function incluir(){
            return $this->cadastrarEntidade($this->getNome(), $this->getTelefone(), $this->getEmail(), $this->getCidade(), $this->getEstado(), $this->getCategoria(), $this->getAtivo());
        }
        
    }
    
