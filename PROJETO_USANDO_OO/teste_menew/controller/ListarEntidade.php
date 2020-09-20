<?php

require_once 'C:/xampp/htdocs/teste_menew/repository/EntidadeRepository.php';
class ListarEntidade {
    
    private $lista;
    
    function __construct() {
        $this->lista = new EntidadeRepository();
        $this->criarTable();
    }
    
    private function criarTable() {
        
            $linhas = $this->lista->listarEntidade();
        
            if (count($linhas) > 0) {

                    foreach ($linhas as $valor) {
                        echo "<tr>";

                        echo "<th>".$valor['idEntidade'] ."</th>";
                        echo "<td>".utf8_decode($valor['nome']) ."</td>";
                        echo "<td>".$valor['telefone'] ."</td>";
                        echo "<td>".$valor['email'] ."</td>";

                        echo "<td>";
                            echo "<a type='button' class='btn btn-outline-primary' href='/teste_menew/view/editCadastroTemplate.php?id=".$valor['idEntidade'] ."'>Editar</a>";
                            echo "  ";
                            
                            if($valor['ativo'] == "S"){
                                echo "<a type='button' class='btn btn-outline-danger' href='/teste_menew/controller/DesativarEntidade.php?id_de=".$valor['idEntidade'] ."'>Desativar</a>";
                            }else{
                                echo "<a type='button' class='btn btn-outline-success' href='/teste_menew/controller/AtivarEntidade.php?id_de=".$valor['idEntidade'] ."'>Ativar</a>"; 
                            }
                            
                        echo "</td>";

                        echo "</tr>";
                    }

            }
        
    }
}

