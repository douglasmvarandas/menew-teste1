<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_agenda extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function getEstadosOpc()
    {
        $qry = 'SELECT id, estado
                FROM estados
                ORDER BY estado ASC';
        
        $opcoes = array();
        foreach($this->db->query($qry)->result() as $row)
        {
            $opcoes[$row->id] = $row->estado;
        }

        return $opcoes;
    }
    
    function getCategoriasOpc()
    {
        $qry = 'SELECT id, categoria
                FROM categorias
                ORDER BY categoria ASC';
        
        $opcoes = array();
        foreach($this->db->query($qry)->result() as $row)
        {
            $opcoes[$row->id] = $row->categoria;
        }

        return $opcoes;
    }

    function getContatos($busca)
    {
        $qry = 'SELECT t1.id, t1.nome, t1.telefone, t1.email, t1.cidade, t2.estado, t3.categoria
                FROM contatos t1
                INNER JOIN estados t2 ON t1.id_estado = t2.id
                INNER JOIN categorias t3 ON t1.id_categoria = t3.id';
        
        if($busca != 'sem_busca'){
            $qry .= ' AND (t1.nome LIKE \'%'.$this->db->escape_like_str($busca).'%\')';
        }

        $qry .= ' ORDER BY t1.id DESC';

        return $this->db->query($qry)
                        ->result();
    }

    function countContatos()
    {
        return $this->db->query('SELECT count(*) as cont
                                 FROM contatos t1
                                 INNER JOIN estados t2 ON t1.id_estado = t2.id
                                 INNER JOIN categorias t3 ON t1.id_categoria = t3.id
                                 ORDER BY t1.id DESC')
                        ->row(0)
                        ->cont;
    }

    function getContato($id_contato)
    {
        return $this->db->query('SELECT *
                                 FROM contatos
                                 WHERE (id = ?)', $id_contato)
                        ->row(0);
    }

    // INSERIR
    function tryInsertContato($nome, $telefone, $email, $cidade, $id_estado, $id_categoria)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO contatos(nome, telefone, email, cidade, id_estado, id_categoria)
                          VALUES (?, ?, ?, ?, ?, ?)', array($nome, $telefone, $email, $cidade, $id_estado, $id_categoria));
        
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->trans_commit();
        return true;
    }

    // ALTERAR
    function tryUpdateContato($id_contato, $nome, $telefone, $email, $cidade, $id_estado, $id_categoria)
    {
        $this->db->trans_begin();
        
        $a = $this->db->query('UPDATE contatos
                          SET nome = ?,
                          telefone = ?,
                          email = ?,
                          cidade = ?,
                          id_estado = ?,
                          id_categoria = ?
                          WHERE (id = ?)', array($nome, $telefone, $email, $cidade, $id_estado, $id_categoria, $id_contato));

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->trans_commit();
        return true;
    }

    // EXCLUIR
    function tryDeleteContato($id_contato)
    {
        $this->db->trans_begin();

        $this->db->query('DELETE FROM contatos
                          WHERE (id = ?)', $id_contato);
        
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->trans_commit();
        return true;
    }   

    function contatoExists($email, $id_contato)
    {
        if(is_null($id_contato)){
            return $this->db->query('SELECT id
                                     FROM contatos
                                     WHERE (email = ?)', $email)
                            ->row(0);
        } else {
            return $this->db->query('SELECT id
                                     FROM contatos
                                     WHERE (email = ?) AND (id != ?)', array($email, $id_contato))
                            ->row(0);
        }
    }
}