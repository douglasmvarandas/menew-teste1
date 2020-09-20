<?php

require_once 'C:/xampp/htdocs/teste_menew/repository/CategoriaEntidadeRepository.php';
class ListarTipoEntidade {
    
    private $lista;
    
    function __construct() {
        $this->lista = new CategoriaEntidadeRepository();
        $this->criarOptionSelect();
    }
    
    private function criarOptionSelect() {
        
        $linhas = $this->lista->listarTipoEntidade();
        
        if (count($linhas) > 0) {
            
                foreach ($linhas as $valor) {

                    echo "<option value='".utf8_encode($valor['sigla'])."'>";
                        echo utf8_encode($valor['nomeEntidade']);
                    echo "</option>";
                }
                              
        }
    }
}
