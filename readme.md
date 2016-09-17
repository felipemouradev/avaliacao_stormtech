***Instruções***

Siga as instruções de instalação da vm:

[Ver Instruções de Instalação da VM (Criação do ambiente)](https://github.com/felipemouradev/machine_stormtech_ava/blob/master/readme.md)

Apos ter criado o ambiente continue, os passos seguintes.

Dentro da pasta machine_stormtech_ava, clone a avaliacao rodando o comando:
```
$ rm -rf booksorting/ && git clone https://github.com/felipemouradev/avaliacao_stormtech booksorting

```

Com a vm devidamente configurada, use o comando (obs: na pasta machine_stormtech_ava)
```
$ vagrant ssh
```
para logar.


Quando logado, rode o comando: 
```
$ cd /var/www/booksorting
```
para ir navegar até o diretorio da aplicação.


Baixando as dependecias do projeto com o composer
```
$ composer install && composer update
```

Você deve renomear(ou copiar e renomear) o arquivo .env.exemple para .env, este arquivo já está pré-configurado lá contém as configurações do banco altere para as suas.
 
 Em seguida rodar o comando: (O Laravel precisa da chave gerada por esse comando para funcionar) :
 
 ```
 $ php artisan key:generate
 ```

***Criando o Ambiente***

Preparando o banco e os dados de mock

```
$ php artisan migrate 
$ php artisan db:seed
```
Está no ar [www.books.dev](www.books.dev)

***Guia de Uso***

Os parametros passados na url seguem o seguinte logica
```
www.books.dev/books/rules=campo+ordenação&campo+ordenação&campo+ordenação ...
```

Os campos podem ser: ***title***, ***author***, ***edition*** e as ordenações ***asc*** ou ***desc***

Alguns exemplos:

[Caso de Teste1 -> http://www.books.dev/rules=title+asc](http://www.books.dev/rules=title+asc)

[Caso de Teste2 -> http://www.books.dev/rules=author+asc&title+desc](http://www.books.dev/rules=author+asc&title+desc)

[Caso de Teste3 -> http://www.books.dev/rules=edition+desc&author+desc&title+asc](http://www.books.dev/rules=edition+desc&author+desc&title+asc)
    
Os resultados seram retornados em JSON

Você também pode querer rodar testes unitarios: (dentro da pasta booksorting):

```
$ vendor/bin/phpunit tests
```