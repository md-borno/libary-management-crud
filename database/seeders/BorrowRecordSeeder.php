<?php

namespace Database\Seeders;

use App\Models\BorrowRecord;
use Illuminate\Database\Seeder;

class BorrowRecordSeeder extends Seeder
{
    public function run()
    {
        $borrowRecords = [
            [
                'book_id' => 1,
                'borrower_name' => 'John Doe',
                'borrowed_at' => now()->subDays(10),
                'returned_at' => now()->subDays(3)
            ],
            [
                'book_id' => 2,
                'borrower_name' => 'Jane Smith',
                'borrowed_at' => now()->subDays(5),
                'returned_at' => null // Currently borrowed
            ],
            [
                'book_id' => 3,
                'borrower_name' => 'Bob Johnson',
                'borrowed_at' => now()->subDays(15),
                'returned_at' => now()->subDays(7)
            ],
            [
                'book_id' => 1,
                'borrower_name' => 'Alice Brown',
                'borrowed_at' => now()->subDays(2),
                'returned_at' => null // Currently borrowed
            ],
            [
                'book_id' => 5,
                'borrower_name' => 'Charlie Wilson',
                'borrowed_at' => now()->subDays(8),
                'returned_at' => now()->subDays(1)
            ],
        ];

        foreach ($borrowRecords as $record) {
            BorrowRecord::create($record);
        }
    }
}