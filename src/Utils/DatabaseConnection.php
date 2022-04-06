<?php 
/**
 * Gerencia a conexão ao banco de dados
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */

namespace MvcSkeleton\Utils;

use PDO;

final class DatabaseConnection
{
    private DatabaseConfiguration $configuration;
    private static ?DatabaseConnection $instance = null;
    private PDO $connection;

    /**
     * @throws \Exception
     */
    private function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
        $this->boot();
    }

    /**
     * Inicia a conexão ao banco de dados
     *
     * @return     void
     * @throws \Exception
     */
    private function boot()
    {
        try{
            $this->connection = new PDO($this->configuration->__toString(),$this->configuration->getUser(),
                $this->configuration->getPassword());
                $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * @param DatabaseConfiguration $config
     * @return     DatabaseConnection
     * @throws \Exception
     */
    public static function builder(DatabaseConfiguration $config): DatabaseConnection
    {
        if(DatabaseConnection::$instance == null){
            DatabaseConnection::$instance = new DatabaseConnection($config);
        }
        return DatabaseConnection::$instance;
    }

    public function get()
    {
        return $this->connection;
    }
}