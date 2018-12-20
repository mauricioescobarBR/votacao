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


## License

[MIT](https://github.com/hhxsv5/php-sse/blob/master/LICENSE)
