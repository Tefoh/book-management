<?php

namespace App\Models;

use App\Enums\BookReserveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookReserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'action_by_id',
        'status',
    ];

    protected $casts = [
        'status' => BookReserveStatus::class,
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function actionBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
