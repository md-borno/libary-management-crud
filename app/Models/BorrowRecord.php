<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    use HasFactory;
// !
    protected $fillable = [
        'book_id',
        'borrower_name',
        'borrowed_at',
        'returned_at'
    ];

    protected $casts = [
        'borrowed_at' => 'datetime',
        'returned_at' => 'datetime'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
