<?php
/**
 * ModelInterface 
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton\Models;

interface ModelInterface{

	public function create(array $data);
	public function update(array $data);
	public function delete(int $id);
	
}