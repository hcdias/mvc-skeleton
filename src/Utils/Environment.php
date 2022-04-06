<?php
/**
 * Carrega as variáveis de ambiente da aplicação
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton\Utils;

class Environment
{
    private array $env = [];

    public function __construct()
    {
        $this->env =  parse_ini_file(BASE_PATH.'/.env.ini');
    }

    public function getEnv()
    {
        return $this->env;
    }
}