<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

use App\Http\Requests;

class BookController extends Controller
{
    //
    public function booksort(Request $request){
    	return response()->json(Book::with(
    		['author' => function($query){
    	    		$query->select(['id','name']);
    	    }])->get());   
    }
}
