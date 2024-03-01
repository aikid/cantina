<?php

use Leandrodonascimento\Cantina\Core\Controller;

class EstoqueController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $estoqueData = $this->model("estoque");
        $this->dataReturned = $estoqueData->getDataEstoque();
        $this->view("estoque", $data = ["estoque" => $this->dataReturned]);
    }

    public function criar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("estoque");
        $estoqueModel->createEstoque($_POST["nome"],$_POST["descricao"],$_POST["quantidade"]);
        $json = [];
        $json['item'] = $_POST["nome"];
        echo json_encode($json);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}