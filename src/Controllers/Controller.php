<?php 
/**
 * Abstract Controller 
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton\Controllers;

use MvcSkeleton\Utils\Template;

abstract class Controller
{
	protected $template;

	public function __construct()
	{
		$template = new Template();
		$this->template = $template->engine();
	}

}