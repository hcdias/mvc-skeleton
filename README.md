# MVC skeleton

## Dependências para executar o projeto

- Composer
- PHP 7.4
- MySQL 5.7
- Extensões: php-curl php7.4-curl php7.4-xml php7.4-mbstring php-mysql

## Execução

Instale as dependencias do projeto utilizado o [composer](https://getcomposer.org/download/ "Composer download"): `$ composer install`

Após instalar as dependências, crie um arquivo **.env** a partir do arquivo .env.ini.example. Preencha o arquivo com os dados de conexão ao banco de dados:

A partir do terminal, disponibilize o acesso a partir do diretório `/public` com o comando: `php -S localhost:8000`

Acesse o endereço no navegador: http://localhost:8000

## Testes

A suite de testes utilizada é o [Codeception](https://codeception.com/)

Para executar os testes, execute o comando: `php vendor/bin/codecept run unit`
