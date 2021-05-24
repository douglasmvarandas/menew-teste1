<?php
//incluindo o arquivo contendo a classe TelefoneModel
require_once 'models/TelefoneModel.php';

class ContatoModel extends PersistModelAbstract
{
    private $in_id;
    private $st_nome;
    private $st_email;
    private $st_cidade;
    private $st_estado;
    private $st_categoria;
    private $in_ddd;
    private $in_telefone;
      
    function __construct()
    {
        parent::__construct();
        //executa método de criação da tabela de Telefone
        $this->createTableContato();
        $this->createTableTelefone();
    }

      
      
    /**
     * Setters e Getters da
     * classe ContatoModel
     */
      
    public function setId( $in_id )
    {
        $this->in_id = $in_id;
        return $this;
    }
      
    public function getId()
    {
        return $this->in_id;
    }

    public function setDDD( $in_ddd )
    {
        $this->in_ddd = $in_ddd;
        return $this;
    }
      
    public function getDDD()
    {
        return $this->in_ddd;
    }

    public function setTelefone( $in_telefone )
    {
        $this->in_telefone = $in_telefone;
        return $this;
    }
      
    public function getTelefone()
    {
        return $this->in_telefone;
    }
      
    public function setNome( $st_nome )
    {
        $this->st_nome = $st_nome;
        return $this;
    }
      
    public function getNome()
    {
        return $this->st_nome;
    }
      
    public function setEmail( $st_email )
    {
        $this->st_email = $st_email;
        return $this;
    }
      
    public function getEmail()
    {
        return $this->st_email;
    }
    
    public function setCidade( $st_cidade )
    {
        $this->st_cidade = $st_cidade;
        return $this;
    }
      
    public function getCidade()
    {
        return $this->st_cidade;
    }

    public function setEstado( $st_estado )
    {
        $this->st_estado = $st_estado;
        return $this;
    }
      
    public function getEstado()
    {
        return $this->st_estado;
    }

    public function setCategoria( $st_categoria )
    {
        $this->st_categoria = $st_categoria;
        return $this;
    }
      
    public function getCategoria()
    {
        return $this->st_categoria;
    }
      
    /**
    * Retorna um array contendo os contatos
    * @param string $st_nome
    * @return Array
    */
    public function _list( $st_nome = null )
    {
        $filtro = '';
        if(isset($_SESSION['filtro'])){
            $filtro = $_SESSION['filtro'];
        }
        if(!is_null($st_nome))
            $st_query = "SELECT * FROM tbl_contato WHERE con_st_nome LIKE '%$st_nome%';";
        else
            //$st_query = 'SELECT * FROM tbl_contato;';   
            $st_query = "SELECT A.con_in_id,con_st_nome,con_st_email,con_st_cidade,con_st_estado,con_st_categoria,tel_in_ddd,tel_in_telefone FROM tbl_contato A LEFT JOIN (SELECT * FROM tbl_telefone WHERE tel_in_id in (SELECT min(tel_in_id) FROM tbl_telefone group by con_in_id))B ON A.con_in_id = B.con_in_id WHERE con_st_nome like '%".$filtro."%' ORDER BY 1;";
        $v_contatos = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $o_contato = new ContatoModel();
                $o_contato->setId($o_ret->con_in_id);
                $o_contato->setNome($o_ret->con_st_nome);
                $o_contato->setEmail($o_ret->con_st_email);
                $o_contato->setCidade($o_ret->con_st_cidade);
                $o_contato->setEstado($o_ret->con_st_estado);
                $o_contato->setCategoria($o_ret->con_st_categoria);
                $o_contato->setDDD($o_ret->tel_in_ddd);
                $o_contato->setTelefone($o_ret->tel_in_telefone);
                array_push($v_contatos, $o_contato);
            }
            if(isset($_SESSION['filtro'])){
                unset($_SESSION['filtro']);
            }
        }
        catch(PDOException $e)
        {}              
        return $v_contatos;
    }
      
    /**
    * Retorna os dados de um contato referente
    * a um determinado Id
    * @param integer $in_id
    * @return ContatoModel
    */
    public function loadById( $in_id )
    {
        $v_contatos = array();
        $st_query = "SELECT * FROM tbl_contato WHERE con_in_id = $in_id;";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $this->setId($o_ret->con_in_id);
        $this->setNome($o_ret->con_st_nome);
        $this->setEmail($o_ret->con_st_email);
        $this->setCidade($o_ret->con_st_cidade);
        $this->setEstado($o_ret->con_st_estado);
        $this->setCategoria($o_ret->con_st_categoria);
        return $this;
    }
      
    /**
    * Salva dados contidos na instancia da classe
    * na tabela de contato. Se o ID for passado,
    * um UPDATE será executado, caso contrário, um
    * INSERT será executado
    * @throws PDOException
    * @return integer
    */
    public function save()
    {
        if(is_null($this->in_id))
            $st_query = "INSERT INTO tbl_contato
                        (
                            con_st_nome,
                            con_st_email,
                            con_st_cidade,
                            con_st_estado,
                            con_st_categoria
                        )
                        VALUES
                        (
                            '$this->st_nome',
                            '$this->st_email',
                            '$this->st_cidade',
                            '$this->st_estado',
                            '$this->st_categoria'
                        );";
        else
            $st_query = "UPDATE
                            tbl_contato
                        SET
                            con_st_nome = '$this->st_nome',
                            con_st_email = '$this->st_email',
                            con_st_cidade = '$this->st_cidade',
                            con_st_estado = '$this->st_estado',
                            con_st_categoria = '$this->st_categoria'
                        WHERE
                            con_in_id = $this->in_id";
        try
        {
              
            if($this->o_db->exec($st_query) > 0)
                if(is_null($this->in_id))
                {
                   /*
                    * verificando se o driver usado é sqlite e pegando o ultimo id inserido
                    * por algum motivo, a função nativa do PDO::lastInsertId() não funciona com sqlite
                    */
                    if($this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite')
                    {
                        $o_ret = $this->o_db->query('SELECT last_insert_rowid() AS con_in_id')->fetchObject();
                        return $o_ret->con_in_id;
                    }
                    else
                        return $this->o_db->lastInsertId();
                }
                else
                    return $this->in_id;
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return false;               
    }
  
    /**
    * Deleta os dados persistidos na tabela de
    * contato usando como referencia, o id da classe.
    */
    public function delete()
    {
        if(!is_null($this->in_id))
        {
            $st_query = "DELETE FROM
                            tbl_contato
                        WHERE con_in_id = $this->in_id";
            if($this->o_db->exec($st_query) > 0)
                return true;
        }
        return false;
    }
      
    /**
    * Cria tabela para armazernar os dados de contato, caso
    * ela ainda não exista.
    * @throws PDOException
    */
    private function createTableContato()
    {
        /*
        * No caso do Sqlite, o AUTO_INCREMENT é automático na chave primaria da tabela
        * No caso do MySQL, o AUTO_INCREMENT deve ser especificado na criação do campo
        */
        if($this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite')
            $st_auto_increment = '';
        else
            $st_auto_increment = 'AUTO_INCREMENT';
         
        $st_query = "CREATE TABLE IF NOT EXISTS tbl_contato
                    (
                        con_in_id INTEGER NOT NULL $st_auto_increment,
                        con_st_nome VARCHAR(200) NOT NULL,
                        con_st_email VARCHAR(255),
                        con_st_cidade VARCHAR(100),
                        con_st_estado VARCHAR(50),
                        con_st_categoria VARCHAR(50),
                        PRIMARY KEY(con_in_id)
                    )";
 
        //executando a query;
        try
       {
            $this->o_db->exec($st_query);
        }
        catch(PDOException $e)
        {
            throw $e;
        }   
    }

    /**
    * Cria tabela para armazernar os dados de telefone, caso
    * ela ainda não exista.
    * @throws PDOException
    */
    private function createTableTelefone()
    {
        /*
        * No caso do Sqlite, o AUTO_INCREMENT é automático na chave primaria da tabela
        * No caso do MySQL, o AUTO_INCREMENT deve ser especificado na criação do campo
        */
        if($this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite')
            $st_auto_increment = '';
        else
            $st_auto_increment = 'AUTO_INCREMENT';
         
         
        $st_query = "CREATE TABLE IF NOT EXISTS tbl_telefone
                    (
                        tel_in_id INTEGER NOT NULL $st_auto_increment,
                        con_in_id INTEGER NOT NULL,
                        tel_in_ddd VARCHAR(5),
                        tel_in_telefone VARCHAR(12),
                        PRIMARY KEY(tel_in_id)
                    )";
         
        //executando a query;
        try
        {
            $this->o_db->exec($st_query);
        }
        catch(PDOException $e)
        {
            throw $e;
        }   
    }
}
?>