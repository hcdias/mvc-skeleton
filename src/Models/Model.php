<?php
/**
 * Abstract Model
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */

namespace MvcSkeleton\Models;
use MvcSkeleton\Utils\DatabaseConfiguration;
use MvcSkeleton\Utils\DatabaseConnection;
use MvcSkeleton\Utils\Environment;
use PDO;

abstract class Model implements ModelInterface{

	protected PDO $builder;
	protected array $env;
	public function __construct()
	{	
		$env = (new Environment())->getEnv();
		$config = new DatabaseConfiguration($env['host'],(int) $env['port'],$env['user'],$env['password'],$env['database'],$env['sgbd']);
		$this->builder = DatabaseConnection::builder($config)->get();
		$this->env = $env;
	}

    /**
     * Retorna a configuracao de ambiente
     *
     * @return array The environment.
     */
	public function getEnv(): array
	{
		return $this->env;
	}
	/**
	 * Retona a tabela 
	 *
	 * @return string  The table.
	 */
	public function getTable()
	{
		return $this->table;
	}

    /**
     * @param array $data Dados
     *
     * @return boolean
     * @throws \Exception
     */
	public function create(array $data): bool
    {
		$keys = array_keys($data);
		if( $this->isFillable($keys) ){
			return $this->save($data);
		}

		return false;
	}

    /**
     * @param array $data
     */
	public function update(array $data)
	{

	}

    /**
     * @param int $id
     */
	public function delete(int $id)
	{

	}


	protected function getFillableFields()
	{
		$keys = array_keys($this->fillable);
	}

	/**
	 * Verifica se os dados enviados estão previamente autorizados a serem preenchidos
	 *
	 * @param      array       $data
	 *
	 * @throws     \Exception
	 *
	 * @return     boolean     True if the specified data is fillable, False otherwise.
	 */
	protected function isFillable(array $data): bool
    {
		foreach($data as $value){
			if(!in_array($value, $this->fillable)){
				throw new \Exception("Campo {$value} não definido");
			}
		}

		return true;
	}

	/**
	 * Faz o commit das alterações ao bd
	 *
	 * @param array $data
	 */
	protected function save(array $data)
	{
		$fields = implode(',',array_keys($data));

		$generator = (function($data){
			foreach($data as $key => $field)
				yield ' :'.$key.',';
		})($data);

		$placeholder = "";
		foreach($generator as $x){
			$placeholder .= $x;
		}

		$placeholder = substr($placeholder, 0, -1);
		
		$stmt = $this->builder->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholder})");
		foreach($data as $key => &$dataBind){
			$stmt->bindParam(":$key",$dataBind);
		}

		try{
			return $stmt->execute();
		}catch (\PDOException $e){
			throw $e;
		}
	}
}