<?php

class CategoriaEntidade {
    
    private $idTipoEntidade;
    private $nomeEntidade;
    private $sigla;
    
    function __construct() {}

    function getIdTipoEntidade() {
        return $this->idTipoEntidade;
    }

    function getNomeEntidade() {
        return $this->nomeEntidade;
    }

    function getSigla() {
        return $this->sigla;
    }

    function setIdTipoEntidade($idTipoEntidade): void {
        $this->idTipoEntidade = $idTipoEntidade;
    }

    function setNomeEntidade($nomeEntidade): void {
        $this->nomeEntidade = $nomeEntidade;
    }

    function setSigla($sigla): void {
        $this->sigla = $sigla;
    }

}
