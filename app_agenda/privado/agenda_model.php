<?php
class AgendaModel{
//Atributos
private $id_contatos = null;
private $nome = null;
private $email = null;
private $telefone= null;
private $cidade = null;
private $estado = null;
private $categoria = null;

// setters e getters (overloaging sobrecarga)
function __set($atributo,$valor){
    $this->$atributo = $valor;
}

function __get($atributo){
    return $this->$atributo;
}

}
?>