<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("estoque_model");
        $this->load->helper('url');
        $this->load->library('session');
        
        // Verificar se o usuário está logado
        if (!$this->session->userdata('logado')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data["produtos"] = $this->estoque_model->get("produtos");
        $data["servicos"] = $this->estoque_model->get("servicos");
        $data['menuProdutos'] = 'Catálogo';
        $data['tituloMenuProdutos'] = 'Catálogo de Produtos e Serviços';
        
        $this->load->view('tema/header', $data);
        $this->load->view('catalogo/catalogo', $data);
        $this->load->view('tema/footer');
    }

    public function getProdutos()
    {
        $produtos = $this->estoque_model->get("produtos");
        echo json_encode($produtos);
    }

    public function getServicos()
    {
        $servicos = $this->estoque_model->get("servicos");
        echo json_encode($servicos);
    }

    public function adicionarProdutoOS()
    {
        $produto_id = $this->input->post("produto_id");
        $os_id = $this->input->post("os_id");
        
        if ($produto_id && $os_id) {
            $produto = $this->estoque_model->getById("produtos", "idProdutos", $produto_id);
            if ($produto) {
                $data = array(
                    "produto_id" => $produto_id,
                    "os_id" => $os_id,
                    "quantidade" => 1,
                    "preco" => $produto->precoVenda,
                    "subTotal" => $produto->precoVenda
                );
                
                $this->load->model("os_model");
                $result = $this->os_model->add("os_itens", $data);
                
                if ($result) {
                    echo json_encode(array("success" => true, "message" => "Produto adicionado à OS com sucesso!"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Erro ao adicionar produto à OS."));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Produto não encontrado."));
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Dados incompletos."));
        }
    }

    public function adicionarServicoOS()
    {
        $servico_id = $this->input->post("servico_id");
        $os_id = $this->input->post("os_id");
        
        if ($servico_id && $os_id) {
            $servico = $this->estoque_model->getById("servicos", "idServicos", $servico_id);
            if ($servico) {
                $data = array(
                    "servico_id" => $servico_id,
                    "os_id" => $os_id,
                    "quantidade" => 1,
                    "preco" => $servico->preco,
                    "subTotal" => $servico->preco
                );
                
                $this->load->model("os_model");
                $result = $this->os_model->add("os_itens", $data);
                
                if ($result) {
                    echo json_encode(array("success" => true, "message" => "Serviço adicionado à OS com sucesso!"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Erro ao adicionar serviço à OS."));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Serviço não encontrado."));
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Dados incompletos."));
        }
    }
}
