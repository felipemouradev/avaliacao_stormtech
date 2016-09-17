<?php

use App\Http\Controllers\BookController;

class BookTest extends TestCase
{
    public function testSortTitleAsc(){

        $books = new BookController();
        $books = json_decode($books->listBooks('rules=title+asc'));

        $this->assertTrue($books[0]->id==3,'Book 3');
        $this->assertTrue($books[1]->id==4);
        $this->assertTrue($books[2]->id==1);
        $this->assertTrue($books[3]->id==2);
    }

    public function testSortAuthorAscTitleDesc(){
        $books = new BookController();
        $books = json_decode($books->listBooks('rules=author+asc&title+desc'));

        $this->assertTrue($books[0]->id==1);
        $this->assertTrue($books[1]->id==4);
        $this->assertTrue($books[2]->id==3);
        $this->assertTrue($books[3]->id==2);
    }

    public function testSortEditionDescAuthorDescTitleAsc(){
        $books = new BookController();
        $books = json_decode($books->listBooks('rules=edition+desc&author+asc&title+asc'));

        $this->assertTrue($books[0]->id==4);
        $this->assertTrue($books[1]->id==1);
        $this->assertTrue($books[2]->id==3);
        $this->assertTrue($books[3]->id==2);
    }

    public function testSortEmptyEmpty(){
        $books = new BookController();
        $books = $books->listBooks();
        $this->assertTrue(empty($books));
    }

    /*
    Esse teste recebe uma objeto da IIlluminate\Http\JsonResponse
    é difente dos outros porque seu status code é 404 (response()->json($data,$statusCode)
    nos testes acima as saídas não necessitam de response()->json pois o padrão
    nos retornos para as rotas no laravel são JSON e 200
    */
    public function testSortNullParameters(){
        $books = new BookController();
        $books = $books->listBooks('rules=');
        $this->assertTrue($books->getData()->message=="Incorrect or null parameters");
        $this->assertTrue($books->status()==404);
    }
}
