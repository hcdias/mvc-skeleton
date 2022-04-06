<?php
/**
 * Model para a manipulação de registros
 *
 * @author     Hugo Dias <hugo.dias@aluno.ufop.edu.br>
 * @since      2020
 */
namespace MvcSkeleton\Models;

class ExampleModel extends Model{

    protected string $table = 'example_model';
    protected  array $fillable = [
        'campo_1',
        'campo_2'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}