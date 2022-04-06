<?php 
/**
 * Define a engine de template da aplicação.
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton\Utils;

use Twig\Loader\FilesystemLoader;

class Template
{
    protected $template;

    public function __construct()
    {
        $twigLoader = new FilesystemLoader(BASE_PATH.'/src/Views');
        $this->template = new \Twig\Environment($twigLoader);
    }

    public function engine(): \Twig\Environment
    {
        return $this->template;
    }
}