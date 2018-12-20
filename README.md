Votação Unipampa
======

Módulo para o sistema GURI da Unipampa para permitir a realização de votações dos encaminhamentos e proposições relacionados aos itens de pauta das reuniões do órgãos colegiados da universidade.

## Requisitos:

* PHP (5.3.7+)
* MySQL (5.1+)
* Apache 2

## Importando repositório através do git:

```BASH
git clone https://github.com/mauriciounipampa/votacao.git
```
Lembre-se de importar o banco de dados da aplicação, que está na pasta raiz, no arquivo "votacao (3).sql".

## Configurando o CodeIgniter:

Abra o arquivo application/config/config.php com um editor de texto e insira sua URL base, em $config['base_url']. Por exemplo:
```BASH
$config['base_url'] = 'http://localhost/votacao';
```

Para configurar o banco de dados, abra o arquivo application/config/database.php com um editor de texto e defina as configurações do banco de dados, em $db['default']. Por exemplo:
```BASH
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
  	'username' => 'root',
  	'password' => 'root',
	'database' => 'votacao',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
