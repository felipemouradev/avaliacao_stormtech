<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exceptions\SortingServiceException;
use App\Http\Services\ServiceBookUrlParser;

class BookController extends Controller
{

    public function listBooks($params = null){
        $serviceBook = new ServiceBookUrlParser();

    	try {
            $params = $serviceBook->urlRulesParser($params);
            //caso 4
            if(is_null($params)) throw new SortingServiceException();
            //caso 5
            if(empty($params)) return [];
            //por padrão (do Laravel) isso ira retornar em json e com status code 200
    		return (new Book())->sortingBooks($params);

    	} catch(SortingServiceException $e){
    	    //response()->json porque preciso passar um status code 404
    		return response()->json([ 'message' => $e->errorMessage()],404);
    	}
    }
}
