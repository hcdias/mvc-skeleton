<?php 
/**
 * Kernel da aplicação. Inicializa as rotas e despacha as requisições
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton;


use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Application
{
	const VERSION = '1.0.0';

	private Dispatcher $dispatcher;
	private $httpMethod;
	private $uri;

    /**
     * Inicializa as rotas
     *
     * @param array $routes The routes
     */
	public function __construct(Array $routes)
	{
		$this->httpMethod = $_SERVER['REQUEST_METHOD'];
		$this->uri = $_SERVER['REQUEST_URI'];

		$this->dispatcher = simpleDispatcher(function(RouteCollector $r) use ($routes){
			foreach($routes as $route){
				$r->addRoute($route['method'],$route['uri'],$route['handler']);	
			}
		});
	}


	/**
	 * Resolve as requisições e invoca o respectivo controller
	 */
	public function run()
	{
		$uri = $this->uri;
		$httpMethod = $this->httpMethod;

		if (false !== $pos = strpos($uri, '?')) {
 		   $uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
		    case Dispatcher::NOT_FOUND:
		        echo 'not found';
		        break;
		    case Dispatcher::METHOD_NOT_ALLOWED:
		        $allowedMethods = $routeInfo[1];
		        echo 'not allowed';
		        break;
		    case Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars = $routeInfo[2];
		        $flag = strpos($handler,'@');

		        $controllerRoute = substr($handler,0,$flag);
		        $method = substr($handler,$flag+1);
		        
		        $controller = $this->controllerFactory($controllerRoute);

		        echo $controller->$method($vars);
		        
		        break;
		}
	}

    /**
     * Instancia controladores por requisição
     *
     * @param string $controller The controller string
     *
     * @return mixed $controllerInstance  Controlador instanciado
     */
	private function  controllerFactory($controller)
	{
		$controller = "\MvcSkeleton\Controllers\\".$controller;
		return new $controller;
	}
}