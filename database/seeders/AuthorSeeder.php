<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        // to do: factory 
        $authors = [
            [
                'name' => 'J.K. Rowling',
                'email' => 'jkrowling@example.com',
                'birth_date' => '1965-07-31'
            ],
            [
                'name' => 'George R.R. Martin',
                'email' => 'grrmartin@example.com',
                'birth_date' => '1948-09-20'
            ],
            [
                'name' => 'J.R.R. Tolkien',
                'email' => 'jrrtolkien@example.com',
                'birth_date' => '1892-01-03'
            ],
            [
                'name' => 'Stephen King',
                'email' => 'sking@example.com',
                'birth_date' => '1947-09-21'
            ],
            [
                'name' => 'Agatha Christie',
                'email' => 'achristie@example.com',
                'birth_date' => '1890-09-15'
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}