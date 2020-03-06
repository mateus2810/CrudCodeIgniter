<?php

class Usuario_model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function cadastrar($data)
    {

        return $this->db->insert('usuario', $data);
    }

    public function excluir($id = null)
    {
        $this->db->where('idUsuario', $id);

        return $this->db->delete('usuario');

    }

    public function salvar_atualizacao($data, $id)
    {


        $this->db->where('idUsuario', $id);
        return $this->db->update('usuario', $data);

    }

    public function salvar_senha($id, $senha_antiga, $senha_nova)
    {

        $this->db->select('senha');
        $this->db->where('idUsuario', $id);
        $data['senha'] = $this->db->get('usuario')->result();
        $dados['senha'] = $senha_nova;

        if ($data['senha'][0]->senha == $senha_antiga) {
            $this->db->where('idUsuario', $id);
            $this->db->update('usuario', $dados);
            return true;
        } else {
            return false;
        }
    }

    function get_usuarios()
    {
        $this->db->select('*');

        return $this->db->get('usuario')->result();
    }

    function get_usuarios_like()
    {
        $termo = $this->input->post('pesquisar');
        $this->db->select('*');
        $this->db->like('nome', $termo);
        return $this->db->get('usuario')->result();
    }


    function get_cidades()
    {
        $this->db->select('*');
        return $this->db->get('cidade')->result();
    }

    public function get_qtd_usuarios()
    {
        $this->db->select('count(*) as total');
        return $this->db->get('usuario')->result();
    }

    function get_usuarios_pag($value, $reg_p_pag)
    {
        $this->db->select('*');
        $this->db->limit($reg_p_pag, $value);
        return $this->db->get('usuario')->result();
    }


}