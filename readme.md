***Instruções***


Em criar um novo banco de dados com o nome booksorting 
```SQL 
CREATE SCHEMA `booksorting`;
```
Logo em seguida clonar o projeto, rodar o comando git clone na linha de comnando:
```
$ git clone https://github.com/felipemouradev/avaliacao_stormtech
$ cd avaliacao_stormtech
```
Baixando as dependecias do projeto com o composer
```
$ composer install
```

Alterar o arquivo .env.exemple para .env, este arquivo já está pre-configurado lá contém as configurações do banco altere para as suas.
 
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

Para subir um servidor de testes com o Laravel bastar rodar o comando: (http://localhost:8000):

```
$ php artisan serve
```

Obs. Caso deseje rodar o servidor em outra porta basta usar (dentro da pasta booksorting) :
``` 
$ php -S localhost:PORTA_DESEJADA public/index.php
```

***Guia de Uso***

Os parametros passados na url seguem o seguinte logica
```
localhost:3000/books/rules=campo+ordenação&campo+ordenação&campo+ordenação ...
```

Os campos podem ser: ***title***, ***author***, ***edition***

Alguns exemplos:

[Caso de Teste1 -> https://localhost:3000/rules=title+asc](https://localhost:3000/rules=title+asc)

[Caso de Teste2 -> https://localhost:3000/rules=author+asc&title+desc](https://localhost:3000/rules=author+asc&title+desc)

[Caso de Teste3 -> https://localhost:3000/rules=title+asc](https://localhost:3000/rules=title+asc)
    
Os resultados seram retornados em JSON

Você também pode querer rodar testes unitarios (dentro da pasta booksorting):

```
vendor/bin/phpunit tests
```