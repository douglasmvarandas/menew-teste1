<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_menew extends CI_Controller 
{

	function __construct()
    {
        parent::__construct();

        $this->load->Model('Model_agenda');
    }

	function index()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		$rules = array(
			array('field' => 'nome', 'label' => 'Nome', 'rules' => 'required|min_length[3]|max_length[255]'),
			array('field' => 'telefone', 'label' => 'Telefone', 'rules' => 'required'),
			array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_uniqueEmail'),
			array('field' => 'cidade', 'label' => 'Cidade', 'rules' => 'required|min_length[3]|max_length[255]'),
			array('field' => 'estado', 'label' => 'Estado', 'rules' => 'required'),
			array('field' => 'categoria', 'label' => 'Categoria', 'rules' => 'required')
		);

		$this->form_validation->set_message('required', 'O campo {field} é obrigatório.');
		$this->form_validation->set_message('min_length', 'O campo {field} deve ter no mínimo 3 caracteres.');
		$this->form_validation->set_message('max_length', 'O campo {field} deve ter no máximo 255 caracteres.');
		$this->form_validation->set_message('valid_email', 'Insira um Email válido.');

		$this->form_validation->set_rules($rules);


		// Passou nas validações
		if($this->form_validation->run()){
            if($this->Model_agenda->tryInsertContato($this->input->post('nome'), $this->input->post('telefone'), $this->input->post('email'), $this->input->post('cidade'), $this->input->post('estado'), $this->input->post('categoria'))){
				$dados['msg_sucesso'] = TRUE;
            } else {
                $dados['msg_erro'] = TRUE;
            }
		}

		$dados['estados'] = $this->Model_agenda->getEstadosOpc();
		$dados['categorias'] = $this->Model_agenda->getCategoriasOpc();
		$this->load->view('agenda_cadastro', $dados);
	}

	function listar($busca = 'sem_busca')
	{
		if($this->input->post('busca') != FALSE){
			$busca = ($this->input->post('busca') == "") ? 'sem_busca' : $this->custom_urlencode(str_replace(array('%', "'"), array('', ''), $this->input->post('busca')));
			redirect('agenda/listar/'. $busca, 'refresh');
		}

		if(!$contatos = $this->Model_agenda->getContatos($this->custom_urldecode($busca))){
			redirect('agenda_menew', 'redirect');
		}

		$dados['total_rows'] = $this->Model_agenda->countContatos();
		$dados['contatos'] = $contatos;
		$this->load->view('agenda_listar', $dados);
	}

	function editar($id_contato)
	{
		if(!$contato = $this->Model_agenda->getContato($id_contato)){
            show_404();
		}

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		$rules = array(
			array('field' => 'nome', 'label' => 'Nome', 'rules' => 'required|min_length[3]|max_length[255]'),
			array('field' => 'telefone', 'label' => 'Telefone', 'rules' => 'required'),
			array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_uniqueEmail['.$id_contato.']'),
			array('field' => 'cidade', 'label' => 'Cidade', 'rules' => 'required|min_length[3]|max_length[255]'),
			array('field' => 'estado', 'label' => 'Estado', 'rules' => 'required'),
			array('field' => 'categoria', 'label' => 'Categoria', 'rules' => 'required')
		);

		$this->form_validation->set_message('required', 'O campo {field} é obrigatório.');
		$this->form_validation->set_message('min_length', 'O campo {field} deve ter no mínimo 3 caracteres.');
		$this->form_validation->set_message('max_length', 'O campo {field} deve ter no máximo 255 caracteres.');
		$this->form_validation->set_message('valid_email', 'Insira um Email válido.');

		$this->form_validation->set_rules($rules);


		// Passou nas validações
		if($this->form_validation->run()){
            if($this->Model_agenda->tryUpdateContato($id_contato, $this->input->post('nome'), $this->input->post('telefone'), $this->input->post('email'), $this->input->post('cidade'), $this->input->post('estado'), $this->input->post('categoria'))){
				$dados['msg_sucesso'] = TRUE;
            } else {
                $dados['msg_erro'] = TRUE;
            }
		}

		$dados['contato'] = $contato;
		$this->load->view('agenda_editar', $dados);
	}

	function remover($id_contato)
	{
		if(!$this->Model_agenda->getContato($id_contato)){
            show_404();
        }

		if($this->Model_agenda->tryDeleteContato($id_contato)){
            $this->session->set_flashdata('remove-ok', TRUE);
        } else {
            $this->session->set_flashdata('remove-error', TRUE);
        }

        redirect('agenda_menew/listar', 'refresh');
	}

    function uniqueEmail($str, $id_contato = NULL)
    {
        if($this->Model_agenda->contatoExists($str, $id_contato)){
            $this->form_validation->set_message('uniqueEmail', 'Esse endereço de email já está sendo utilizado por outro contato.');
            return FALSE;
        }

        return TRUE;
	}
	
    function custom_urlencode($str)
	{
		if(trim($str) != ''){
			$str = str_replace(' ', "%20", $str);
			$str = str_replace('+', "%20", $str);
			$str = str_replace(':', '|-1-', $str);
			$str = str_replace('\\', '|-2-', $str);
			$str = str_replace('&','|-4-', $str);
			$str = str_replace('(','|-5-', $str);
			$str = str_replace(')','|-6-', $str);
			$str = str_replace('/','|-7-', $str);
			$str = str_replace('#','|-8-', $str);
			$str = str_replace("\"",'|-9-', $str);
			$str = str_replace("?",'|-10-', $str);
			$str = urlencode($str);
		}
		
		return $str;
	}

	function custom_urldecode($str)
	{
		if(trim($str) != ''){
			$str = urldecode($str);
			$str = str_replace('%20', ' ', $str);
			$str = str_replace('|-1-', ':', $str);
			$str = str_replace('|-2-', '\\', $str);
			$str = str_replace('|-4-', '&', $str);
			$str = str_replace('|-5-', '(', $str);
			$str = str_replace('|-6-', ')', $str);
			$str = str_replace('|-7-', '/', $str);
			$str = str_replace('|-8-', '#', $str);
			$str = str_replace('|-9-', "\"", $str);
			$str = str_replace('|-10-', "?", $str);		
		}
		
		return $str;
	}
}
