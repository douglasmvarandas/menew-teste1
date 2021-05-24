<?php
class AgendaServico{
    private $agendaModel;
    private $conexao;

    public function __construct(AgendaModel $agendaModel,Conexao $conexao){
        $this->agendaModel= $agendaModel;
        $this->conexao= $conexao->conectar();
    }

    public function listarContatos(){
     $query ='select
     id_contatos,nome,email,telefone,cidade,estado,categoria
      from
      tb_contatos order by nome asc;
     ';

     $stmt=$this->conexao->prepare($query);
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisarContato($id){
        $query='SELECT * FROM tb_contatos WHERE nome LIKE "%'.$id.'%"';
        $stmt=$this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtrarContatoId($id){
        $query='SELECT * FROM tb_contatos WHERE id_contatos='.$id.'
        ';
        $stmt=$this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirContato($id_cont){
        $query='DELETE 
        FROM tb_contatos
         WHERE id_contatos= '.$id_cont.';';
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
    }
    public function atualizarContato($id_cont){
        $query='
        UPDATE 
        tb_contatos
         SET
          nome=:nome,email=:email,telefone=:telefone,cidade=:cidade,estado=:estado,categoria=:categoria
         WHERE id_contatos='.$id_cont.';
           ';
         //preparando query contra sql injection e pegando os dados dos atributos da classe agenda_model e inserindo para o DB
         $stmt = $this->conexao->prepare($query);
         $stmt->bindValue(':nome',$this->agendaModel->__get('nome'));
         $stmt->bindValue(':email',$this->agendaModel->__get('email'));
         $stmt->bindValue(':telefone',$this->agendaModel->__get('telefone'));
         $stmt->bindValue(':cidade',$this->agendaModel->__get('cidade'));
         $stmt->bindValue(':estado',$this->agendaModel->__get('estado'));
         $stmt->bindValue(':categoria',$this->agendaModel->__get('categoria'));
         $stmt->execute();
    }

    public function cadastrarContato(){
        //realizando query para inserir dados no DB
        $query='
        insert
         into 
         tb_contatos(
            nome,email,telefone,cidade,estado,categoria
         )values(
            :nome,:email,:telefone,:cidade,:estado,:categoria
         );';
         //preparando query contra sql injection e pegando os dados dos atributos da classe agenda_model e inserindo para o DB
         $stmt = $this->conexao->prepare($query);
         $stmt->bindValue(':nome',$this->agendaModel->__get('nome'));
         $stmt->bindValue(':email',$this->agendaModel->__get('email'));
         $stmt->bindValue(':telefone',$this->agendaModel->__get('telefone'));
         $stmt->bindValue(':cidade',$this->agendaModel->__get('cidade'));
         $stmt->bindValue(':estado',$this->agendaModel->__get('estado'));
         $stmt->bindValue(':categoria',$this->agendaModel->__get('categoria'));
         $stmt->execute();
    }

}
?>