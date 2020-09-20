<?php

class Estado {
   
    private $idEstado;
    private $nomeEstado;
    private $uf;
    
    function __construct() {}
    
    function getIdEstado() {
        return $this->idEstado;
    }

    function getNomeEstado() {
        return $this->nomeEstado;
    }

    function getUf() {
        return $this->uf;
    }

    function setIdEstado($idEstado): void {
        $this->idEstado = $idEstado;
    }

    function setNomeEstado($nomeEstado): void {
        $this->nomeEstado = $nomeEstado;
    }

    function setUf($uf): void {
        $this->uf = $uf;
    }
}
