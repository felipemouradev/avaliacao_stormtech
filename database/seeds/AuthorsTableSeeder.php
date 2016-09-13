<?php

use Illuminate\Database\Seeder;
use App\Author;
class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name'=>'Deitel & Deitel']);
        Author::create(['name'=>'Martin Fowler']);
        Author::create(['name'=>'Elisabeth Freeman']);
    }
}
