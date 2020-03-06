<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
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

        $this->load->model('usuario_model', 'usuario');
        $dados['usuarios'] = $this->usuario->get_usuarios();
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

        $this->load->view('listar_usuario', $dados);
        $this->load->view('includes/html_footer');
    }

    public function cadastro()
    {

        $this->verificar_sessao(); //função destinada a verificaçao se voce esta logado ou nao
        $this->load->model('usuario_model', 'usuario'); // carrega o model usuario

        $data['cidades'] = $this->usuario->get_cidades();// carrega todos os elementos da tabela cidades e salva no vetor
       // $dados['cidades'] = $this->db->get('cidade')->result();

        //carrega a interface
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('cadastro_usuario', $data);
        $this->load->view('includes/html_footer');
    }

    public function cadastrar()
    {
        $this->verificar_sessao();

        //carrega todos os atributos da tabela usuario
        $data['nome'] = $this->input->post('nome');
        $data['cpf'] = $this->input->post('cpf');
        $data['endereco'] = $this->input->post('endereco');
        $data['nivel'] = $this->input->post('nivel');
        $data['email'] = $this->input->post('email');
        $data['senha'] = md5($this->input->post('senha'));
        $data['status'] = $this->input->post('status');
        $data['cidade_idCidade'] = $this->input->post('cidade');
        // carrega a data e formata de maneira usavel
        $data['dataNascimento'] = implode('-', array_reverse(explode('/', $this->input->post('datanascimento'))));
        $data['funcao'] = $this->input->post('funcao');
        $data['descricao_funcao'] = $this->input->post('descricao_funcao');

        $this->load->model('usuario_model', 'usuario');// carrega o model de usuario
        // se o cadastro for concluido exibe a mensagem um , senao a mensagem 2
        if ($this->usuario->cadastrar($data)) {
            redirect('usuario/pag/1/1');
        } else {
            redirect('usuario/pag/1/2');
        }

    }



    public function excluir($id = null)
    {
        $this->verificar_sessao();

        $this->load->model('usuario_model', 'usuario');// carrega o model usuario

        // se a exclusao for concluida exibe a mensagem um , senao a mensagem 2
        if ($this->usuario->excluir($id)) {
            redirect('usuario/pag/1/1');
        } else {
            redirect('usuario/pag/1/2');
        }

    }

    public function atualizar($id = null, $indice = null)
    {
       // $this->verificar_sessao();

        $this->load->model('usuario_model', 'usuario'); //carrega o model usuario
        $data['cidades'] = $this->usuario->get_cidades(); // carrega o model usuario

        $this->db->where('idUsuario', $id); // pesquisa o usuario pelo id no banco
        $data['usuario'] = $this->db->get('usuario')->result(); // salva o usuario numa lista

        //carrega a interface
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');

        //se a senha for atualizada exibe a mensagem de sucesso, senao a mensagem de erro.
        if ($indice == 1) {
            $data['msg'] = "Senha atualizada com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possivel atualizar a senha.";
            $this->load->view('includes/msg_erro', $data);
        }

        //carrega o restante da interface apos a condiçao
        $this->load->view('editar_usuario', $data);
        $this->load->view('includes/html_footer');
    }

    public function salvar_atualizacao()
    {
        $this->veriicar_sessao();


        $id = $this->input->post('idUsuario');//pega o id do usuario e salva numa variavel
        //carrega todos os atributos da tabela usuarios e cidade e salva numa lista
        $data['nome'] = $this->input->post('nome');
        $data['cpf'] = $this->input->post('cpf');
        $data['endereco'] = $this->input->post('endereco');
        $data['nivel'] = $this->input->post('nivel');
        $data['email'] = $this->input->post('email');
        // $data['senha'] = md5($this->input->post('senha'));
        $data['status'] = $this->input->post('status');
        $data['cidade_idCidade'] = $this->input->post('cidade');
        $data['dataNascimento'] = implode('-', array_reverse(explode('/', $this->input->post('datanascimento'))));
        $data['funcao'] = $this->input->post('funcao');
        $data['descricao_funcao'] = $this->input->post('descricao_funcao');

        $this->load->model('usuario_model', 'usuario');//carrega o model do usuario

        //se a condiçao for respeitada redireciona para a pagina de listagem 1
        if ($this->usuario->salvar_atualizacao($data, $id)) {
            redirect('usuario/pag/1');
        } else {
            redirect('usuario/pag/1');
        }

    }

    public function salvar_senha()
    {
        $this->veriicar_sessao();

      // pega a senha antiga e nova digitada e salva numa variavel
        $senha_antiga = md5($this->input->post('senha_antiga'));
        $senha_nova = md5($this->input->post('senha_nova'));


        $this->load->model('usuario_model', 'usuario');// carrega o model usuario
        $id = $this->input->post('idUsuario');// variavel recebe o id do usuario

        //faz a verificaçao da senha e executa a condiçao
        if ($this->usuario->salvar_senha($id, $senha_antiga, $senha_nova)) {
            redirect('usuario/atualizar/' . $id . '/1');
        } else {
            redirect('usuario/atualizar/' . $id . '/2');
        }
    }

    public function pesquisar()

    {
        $this->veriicar_sessao();

        $this->load->model('usuario_model', 'usuario');// carrega o model usuario
        $dados['usuarios'] = $this->usuario->get_usuarios_like();// pesquisa o usuario e salva numa lista
        //  $this->db->join('cidade','cidade_idCidade=idCidade','inner');

        //carrega a interface
        $this->load->view('includes/html_header');
        $this->load->view('listar_usuario', $dados);
        $this->load->view('includes/menu');

        $this->load->view('includes/html_footer');
    }

    //funçao destinada a paginaçao da listagem dos cruds
    public function pag($value = null)
    {

        if ($value == null) {
            $value = 1;
        }
        $reg_p_pag =6;

        if ($value <= $reg_p_pag) {
            $data['btnA'] = 'pointer-events: none';
        } else {
            $data['btnA'] = '';
        }

        $this->load->model('usuario_model', 'usuario');
        $u = $this->usuario->get_qtd_usuarios();

        if (($u[0]->total - $value) < $reg_p_pag) {
            $data['btnP'] = 'pointer-events: none';
        } else {
            $data['btnP'] = '';
        }
        $this->load->model('usuario_model', 'usuario');
        $data['usuarios'] = $this->usuario->get_usuarios_pag($value,$reg_p_pag);

        $data['value'] = $value;
        $data['reg_p_pag'] = $reg_p_pag;
        $data['qtd_reg'] = $u[0] -> total;

        $v_inteiro = (int)$u[0] -> total / $reg_p_pag;
        $v_resto = $u[0]->total %  $reg_p_pag;

        if($v_resto>0){
            $v_inteiro +=1;
        }

        $data['qtd_botoes'] = $v_inteiro;

        //carrega a interface
        $this->load->view('includes/html_header');

        $this->load->view('includes/menu');
       // $this->load->view('listar_usuario',$data);
         $this->load->view('includes/listar_usuario2',$data);
        $this->load->view('includes/html_footer');

    }




}
