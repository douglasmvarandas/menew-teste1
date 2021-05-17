<?php

namespace app\model;

class Agenda
{
    public function save_contato($nome, $email, $telefone, $cidade, $estado, $categoria)
    {
        $db = new Database();

        $parametros = [
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'cidade' => $cidade,
            'estado' => $estado,
            'categoria' => $categoria,
        ];

        $db->insert("INSERT INTO contatos VALUES (0, :nome, :telefone, :email, :cidade, :estado, :categoria, NOW())", $parametros);
    }

    public function edit_contato($id, $nome, $email, $telefone, $cidade, $estado, $categoria)
    {
        $db = new Database();

        $parametros = [
            'id_contato' => $id,
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'cidade' => $cidade,
            'estado' => $estado,
            'categoria' => $categoria,
        ];

        $db->update("UPDATE contatos SET nome = :nome, telefone = :telefone, email = :email, cidade = :cidade, estado = :estado, categoria =:categoria WHERE id = :id_contato", $parametros);
    }

    public function delete_contato($id)
    {
        $parametros = [
            'id_contato' => $id
        ];

        $db = new Database();
        $db->delete("DELETE FROM contatos WHERE id = :id_contato", $parametros);
    }

    public function verificar_email_existe($email) 
    {
        $parametros = [
            ':email' => $email
        ];
        $db = new Database();
        $resultado = $db->select("SELECT email FROM contatos WHERE email = :email", $parametros);

        if(count($resultado) != 0):
            return true;
        else:
            return false;
        endif;
    }

    public function lista_contatos() 
    {
        $db = new Database();
        $contatos = $db->select("SELECT * FROM contatos");

        return $contatos;
    }

    public function lista_contato_id($id) 
    {
        $parametros = [
            'id_contato' => $id
        ];

        $db = new Database();
        $contatos = $db->select("SELECT * FROM contatos WHERE id = :id_contato", $parametros);

        return $contatos;
    }
}