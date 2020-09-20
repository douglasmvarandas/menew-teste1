<?php

require_once 'C:/xampp/htdocs/teste_menew/repository/EstadoRepository.php';
class ListarEstado {
    
    private $lista;
    
    function __construct() {
        $this->lista = new EstadoRepository();
        $this->criarOptionSelect();
    }
    
    private function criarOptionSelect() {
        
        $linhas = $this->lista->listarEstados();
        
        if (count($linhas) > 0) {
            
                foreach ($linhas as $valor) {

                    echo "<option value='".$valor['uf']."'>";
                        echo utf8_encode($valor['nomeEstado']);
                    echo "</option>";
                }
                              
        }
    }
    
}
