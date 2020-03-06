<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carro extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function verificar_sessao()
    {
        if ($this->session->userdata('logado') == false) {
            redirect('dashboard/login');
        }
    }

    public function index($indice = null)

    {
        $this->verificar_sessao();

        $this->load->model('carro_model', 'carro');
        $dados['carro'] = $this->carro->get_carros();
        //  $this->db->join('cidade','cidade_idCidade=idCidade','inner');

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');

        if ($indice == 1) {
            $data['msg'] = "Usuario cadastrado com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Erro ao cadastrar usuario.";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Usuario excluido com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Erro ao excluir usuario.";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Usuario atualizado com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 6) {
            $data['msg'] = "Erro ao atualizar usuario.";
            $this->load->view('includes/msg_erro', $data);
        }

        $this->load->view('listar_carro', $dados);
        $this->load->view('includes/html_footer');
    }

    public function cadastro()
    {
        $this->verificar_sessao();
        $this->load->model('carro_model', 'carro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('cadastro_carro');
        $this->load->view('includes/html_footer');
    }

    public function cadastrar()
    {
        $this->verificar_sessao();


        $data['modelo'] = $this->input->post('modelo');
        $data['ano'] = $this->input->post('ano');
        $data['marca'] = $this->input->post('marca');

        $this->load->model('carro_model', 'carro');
        if ($this->carro->cadastrar($data)) {
            redirect('carro/pag/1/1');
        } else {
            redirect('carro/pag/1/2');
        }

    }

    public function atualizar($id = null, $indice = null)
    {
        $this->verificar_sessao();

        $this->load->model('carro_model', 'usuario');


        $this->db->where('idCarro', $id);
        $data['carro'] = $this->db->get('carro')->result();

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');

        if ($indice == 1) {
            $data['msg'] = "Senha atualizada com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possivel atualizar a senha.";
            $this->load->view('includes/msg_erro', $data);
        }

        $this->load->view('editar_carro', $data);
        $this->load->view('includes/html_footer');
    }


    public function excluir($id = null)
    {
        $this->verificar_sessao();

        $this->load->model('carro_model', 'carro');


        if ($this->carro->excluir($id)) {
            redirect('carro/pag/1/1');
        } else {
            redirect('carro/pag/1/2');
        }

    }



    public function salvar_atualizacao()
    {
        $this->verificar_sessao();

        $id = $this->input->post('idCarro');

        $data['modelo'] = $this->input->post('modelo');
        $data['ano'] = $this->input->post('ano');
        $data['marca'] = $this->input->post('marca');

        $this->load->model('carro_model', 'carro');

        if ($this->carro->salvar_atualizacao($data, $id)) {
            redirect('carro/pag');
        } else {
            redirect('carro/pag');
        }

    }


    public function pesquisar()

    {
        $this->verificar_sessao();

        $this->load->model('carro_model', 'carro');
        $dados['carro'] = $this->carro->get_carros_like();


        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');


        $this->load->view('listar_usuario', $dados);
        $this->load->view('includes/html_footer');
    }

    public function pag($value = null)
    {

        if ($value == null) {
            $value = 0;
        }
        $reg_p_pag =5;

        if ($value <= $reg_p_pag) {
            $data['btnA'] = 'pointer-events: none';
        } else {
            $data['btnA'] = '';
        }

        $this->load->model('carro_model', 'carro');
        $u = $this->carro->get_qtd_carros();

        if (($u[0]->total - $value) < $reg_p_pag) {
            $data['btnP'] = 'pointer-events: none';
        } else {
            $data['btnP'] = '';
        }
        $this->load->model('carro_model', 'carro');
        $data['carro'] = $this->carro->get_carros_pag($value,$reg_p_pag);

        $data['value'] = $value;
        $data['reg_p_pag'] = $reg_p_pag;
        $data['qtd_reg'] = $u[0] -> total;

        $v_inteiro = (int)$u[0] -> total / $reg_p_pag;
        $v_resto = $u[0]->total %  $reg_p_pag;

        if($v_resto>0){
            $v_inteiro +=1;
        }

        $data['qtd_botoes'] = $v_inteiro;

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('listar_carro',$data);
        $this->load->view('includes/html_footer');
    }




}
