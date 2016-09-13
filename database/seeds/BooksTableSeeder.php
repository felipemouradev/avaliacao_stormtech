<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::create(['title'=>'Java How to Program','year_edition'=>2007,'author_id'=>1]);
        Book::create([
        	'title'=>'Patterns of Enterprise Application Architecture',
        	'year_edition'=>2002,
        	'author_id'=>2]
        	);
        Book::create(['title'=>'Head First Design Patterns','year_edition'=>2004,'author_id'=>3]);
        Book::create(['title'=>'Internet & World Wide Web: How to Program','year_edition'=>2007,'author_id'=>1]);
    }
}
