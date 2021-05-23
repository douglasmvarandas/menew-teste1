<?php

class IndexController
{
    /**
    * Ação que deverá ser executada quando 
    * nenhuma outra for especificada, do mesmo jeito que o
    * arquivo index.html ou index.php é executado quando nenhum
    * é referenciado
    */
    public function indexAction()
    {
        //redirecionando para a pagina de lista de contatos
        header('Location: ?controle=Contato&acao=listarContato');
    }
}
?>