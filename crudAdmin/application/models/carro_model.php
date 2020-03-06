<?php

class Carro_model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function cadastrar($data)
    {

        return $this->db->insert('carro', $data);
    }

    public function excluir($id = null)
    {
        $this->db->where('idCarro', $id);

        return $this->db->delete('carro');

    }

    public function salvar_atualizacao($data, $id)
    {


        $this->db->where('idCarro', $id);
        return $this->db->update('carro', $data);

    }


    function get_carros()
    {
        $this->db->select('*');

        return $this->db->get('carro')->result();
    }

    function get_carros_like()
    {
        $termo = $this->input->post('pesquisar');
        $this->db->select('*');
        $this->db->like('nome', $termo);
        return $this->db->get('carro')->result();
    }

    public function get_qtd_carros()
    {
        $this->db->select('count(*) as total');
        return $this->db->get('carro')->result();
    }

    function get_carros_pag($value, $reg_p_pag)
    {
        $this->db->select('*');
        $this->db->limit($reg_p_pag, $value);
        return $this->db->get('carro')->result();
    }


}