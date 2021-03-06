<?php

namespace controllers;

use application\Controller;
use application\Session;
use application\Dao;
use application\LogUso;

/**
 * Description of categoriaController
 *
 * @author sam
 */
class Curso extends Controller implements Dao {

    private $curso;
    private $log;

    public function __construct() {

        $this->curso = $this->LoadModelo('Curso');
        $this->log = $this->LoadModelo('Log');
        parent::__construct();
        $this->view->setJs(array("novo"));
        $this->view->menu = $this->getFooter('menu');
        $this->view->setCss(array('amaran.min', 'animate.min', 'layout', 'ie'));
        $this->view->titulo = " Tabela de cursos cadastrados";
    }

    public function index() {
        $this->view->dados = $this->curso->pesquisar();
        $this->view->renderizar('index');
    }

    public function adicionar($dados = FALSE) {
        if ($this->getInt('enviar') == 1) {
            $this->view->dados = $_POST;


            if (!$this->getSqlverifica('nome')) {
                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Porfavor Insira um nome");
                //  echo json_encode($ret);
                $this->view->erro = "Porfavor Insira um nome";
                $this->view->renderizar("novo");
                exit;
            }

            if (!$this->getSqlverifica('descricao')) {
                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Porfavor Insira uma descrição");
                //echo json_encode($ret);
                $this->view->erro = "Porfavor Insira uma descrição";
                $this->view->renderizar("novo");
                exit;
            }

            $this->curso->setNome($this->view->dados['nome']);
            $this->curso->setDescricao($this->view->dados['descricao']);
            $p = $this->curso->pesquisarCurso($this->view->dados['nome']);
            if ($p) {
                $this->view->erro = "Curso já Existe";
                $this->view->renderizar("novo");
                exit;
            }
            $id = $this->curso->adicionar($this->curso);

            if ($id) {

                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Dados guardado com sucesso");
                //echo json_encode($ret);
                $this->view->mensagem = "Dados guardado com sucesso";
                $this->log->setIpMaquina($_SERVER['REMOTE_ADDR']);
                $this->log->setAcao('Adicionado novo modúlo ' . $_POST['nome']);
                $this->log->setData(date('d-m-Y h:i:s'));

                $this->log->adicionar($this->log, Session::get('id'));
                $this->view->renderizar("novo");

                exit;
            } else {
                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Erro ao guardar dados");
                //echo json_encode($ret);
                $this->view->erro = "Erro ao guardar dados";
                $this->view->renderizar("novo");

                exit;
            }
        }

        $this->view->renderizar('novo');
    }

    public function editar($id = FALSE) {
        Session::nivelRestrito(array("gestor", 'funcionario'));
        if ($this->getInt('id')) {


            if (!$this->getSqlverifica('nome')) {
                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Porfavor Insira um nome");
                //  echo json_encode($ret);
                $this->view->erro = "Porfavor Insira um nome";
                $this->view->renderizar("novo");
                exit;
            }

            if (!$this->getSqlverifica('descricao')) {
                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Porfavor Insira uma descrição");
                //echo json_encode($ret);
                $this->view->erro = "Porfavor Insira uma descrição";
                $this->view->renderizar("novo");
                exit;
            }
            $this->curso->setNome($this->getSqlverifica('nome'));
            $this->curso->setDescricao($this->getSqlverifica('descricao'));
            $this->curso->setId($this->getInt('id'));
            $id = $this->curso->editar($this->curso);
            $this->log->setIpMaquina($_SERVER['REMOTE_ADDR']);
            $this->log->setAcao('Alterado o curso para ' . $_POST['nome']);
            $this->log->setData(date('d-m-Y h:i:s'));

            $this->log->adicionar($this->log, Session::get('id'));

            if (!$id) {
                //$ret = Array("nome" => Session::get('nome'), "mensagem" => "Erro ao alterar dados");
                //echo json_encode($ret);
                $this->view->erro = "Erro ao alterar dados";
                $this->view->renderizar("novo");
                exit;
            } else {

                $lo = new LogUso('log');
                $lo->verificarArquivo();
                $lo->gravar("Foi Editado um curso" . ' Com o nome de : ' . $_POST['nome']);
                $this->view->mensagem = "Dados alterados com sucesso";
                $this->redirecionar('curso');
            }
        }
        $this->view->dados = $this->curso->pesquisar();
        $this->view->renderizar("index");
    }

    public function pesquisaPor($dados = FALSE) {
        $t = $this->curso->listagem();
        echo json_encode($t);
    }

    public function pesquisar($id = FALSE) {
        
    }

    public function remover($id = FALSE) {
        Session::nivelRestrito(array("gestor", 'funcionario'));
        if ($id) {
            $this->curso->remover($id);
            $this->log->setIpMaquina($_SERVER['REMOTE_ADDR']);
            $this->log->setAcao('Removido o curso ' . $_POST['nome']);
            $this->log->setData(date('d-m-Y h:i:s'));


            $this->log->adicionar($this->log, Session::get('id'));

            $lo = new LogUso('log');
            $lo->verificarArquivo();
            $lo->gravar("Foi apagado um  curso");
            return TRUE;
        }
        $this->redirecionar('curso');
    }

    public function editarDados($id = FALSE) {
        Session::nivelRestrito(array("gestor", 'funcionario'));
        $this->view->dados = $this->curso->pesquisar($id);
        $this->view->renderizar('editarDados');
    }

}
