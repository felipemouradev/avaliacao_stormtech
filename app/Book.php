<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public static $fields = [
        'title','edition','author'
    ];

    /***
     * @desc retorna uma consulta base para receber mais parametros
     */
	public function bookQuery(){
	    return $this::join('authors','books.author_id','authors.id')
            ->select('books.id','books.title','books.year_edition as edition','authors.name as author');
	}

    /***
     * @desc Ordena os livros de acordo com os parametros passados e na ordem em que foram passados
     */
	public function sortingBooks($params){
		$builder = $this->bookQuery();
        foreach ($params as $rule) {
            $builder->orderBy($rule['field'],$rule['order']);
        }
	    return $builder->get();
	}
}
