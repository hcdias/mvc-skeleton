<?php
/**
 * Carrega o autoload, define as rotas disponíveis e inicia a aplicação
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */

// error_reporting(E_ALL);
// ini_set('display_errors',1);

use MvcSkeleton\Application;

require_once dirname(__FILE__)."/vendor/autoload.php";

define('BASE_PATH',realpath(dirname(__FILE__)));

$routes = [
 	['method' => 'GET', 'uri'=>'/', 'handler'=>'IndexController@index' ],
 	['method' => 'GET', 'uri'=>'/ajude', 'handler'=>'IndexController@ajude' ],
 	['method' => 'GET', 'uri'=>'/quem-somos', 'handler'=>'IndexController@sobre' ],
 	['method' => 'GET', 'uri'=>'/contato', 'handler'=>'IndexController@contato' ],
 	['method' => 'POST', 'uri'=>'/store/{token:[a-zA-Z0-9]+}', 'handler'=>'IndexController@store' ],
];

$app = new Application($routes);
$app->run();