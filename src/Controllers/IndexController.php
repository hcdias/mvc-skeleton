<?php 
/**
 * Index Controller
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton\Controllers;

use MvcSkeleton\Models\ExampleModel;
use \Facebook\GraphNodes\GraphUser;
use \Facebook\Authentication\AccessToken;
use \Facebook\FacebookResponse;

class IndexController extends Controller
{
    /**
     * renderiza a pagina inicial
     *
     * @return     string  conteudo da pagina
     */
    public function index()
    {
        return $this->template->render('index.html.twig',[]);
    }
    /**
     * renderiza a pagina sobre o como o usuário pode ajudar o sistema
     *
     * @return     string  conteudo da pagina
     */
    public function ajude()
    {
        return $this->template->render('ajude.html.twig',[]);
    }
    /**
     * renderiza a pagina sobre os devs
     *
     * @return     string  conteudo da pagina
     */
    public function sobre()
    {
        return $this->template->render('sobre.html.twig',[]);
    }
    /**
     * renderiza a pagina de contato
     *
     * @return     string  conteudo da pagina
     */
    public function contato()
    {
        return $this->template->render('contato.html.twig',[]);
    }

    /**
     * Armazena o token do usuario
     *
     * @param array $params array de parametros
     *
     * @return string json
     * @throws \Exception
     */
    public function store(array $params): string
    {
        $token = $params['token'];
        $exampleModel = new ExampleModel();
        $exampleModel->create($token);

        return json_encode(['msg'=>'dado armazenado','status'=>'success']);


    }

}