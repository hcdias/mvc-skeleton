<?php 
/**
 * Gerencia a configuração de conexão ao banco dedados
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */

namespace MvcSkeleton\Utils;

class DatabaseConfiguration
{
    private  string $host;
    private  int $port;
    private  string $user;
    private  string $password;
    private  string $dbname;
    private  string $sgbd;

    public function __construct(string $host, int $port, string $user, string $password, string $dbname, string $sgbd)
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->sgbd = $sgbd;
    }

    private function getHost(): string
    {
        return $this->host;
    }

    private function getPort(): int
    {
        return $this->port;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }   

    private function getDBname(): string
    {
        return $this->dbname;
    }   

    private function getSgbd(): string
    {
        return $this->sgbd;
    }       

    public function __toString(){
        return "{$this->getSgbd()}:host={$this->getHost()};dbname={$this->getDBName()}";
    }
}