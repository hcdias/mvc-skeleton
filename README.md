# MVC skeleton

## Dependências para executar o projeto

- Composer
- PHP 7.4
- MySQL 5.7

## Execução

Instale as dependencias do projeto utilizado o [composer](https://getcomposer.org/download/ "Composer download"): `$ composer install`

Crie um arquivo **.env** a partir do arquivo .env.ini.example. Preencha o arquivo com os dados de conexão ao banco de dados:
 
    host=localhost
    port=3306
    user=mvcskeleton
    password=password
    database=mvcskeleton
    sgbd=mysql

No terminal, disponibilize o acesso a partir do diretório `/public`: `cd mvcSkeleton/public && php -S localhost:8000`

Acesse o endereço no navegador: http://localhost:8000

## Testes

A suite de testes utilizada é o [Codeception](https://codeception.com/)

Para executar os testes unitários, execute o comando: `php vendor/bin/codecept run unit`