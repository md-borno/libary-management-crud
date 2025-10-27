<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            ['title' => 'Harry Potter and the Philosopher\'s Stone', 'author_id' => 1, 'published_year' => 1997, 'isbn' => '9780747532699'],
            ['title' => 'Harry Potter and the Chamber of Secrets', 'author_id' => 1, 'published_year' => 1998, 'isbn' => '9780747538493'],
            ['title' => 'A Game of Thrones', 'author_id' => 2, 'published_year' => 1996, 'isbn' => '9780553103540'],
            ['title' => 'A Clash of Kings', 'author_id' => 2, 'published_year' => 1998, 'isbn' => '9780553108033'],
            ['title' => 'The Hobbit', 'author_id' => 3, 'published_year' => 1937, 'isbn' => '9780547928227'],
            ['title' => 'The Fellowship of the Ring', 'author_id' => 3, 'published_year' => 1954, 'isbn' => '9780547928210'],
            ['title' => 'The Shining', 'author_id' => 4, 'published_year' => 1977, 'isbn' => '9780385121675'],
            ['title' => 'Carrie', 'author_id' => 4, 'published_year' => 1974, 'isbn' => '9780385086950'],
            ['title' => 'Murder on the Orient Express', 'author_id' => 5, 'published_year' => 1934, 'isbn' => '9780007119318'],
            ['title' => 'And Then There Were None', 'author_id' => 5, 'published_year' => 1939, 'isbn' => '9780312330873'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}