<?php

namespace App\Models;

use App\Enums\BookReserveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'version',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date'
    ];

    public function cantBeReserved()
    {
        return $this->lastStatus?->status === BookReserveStatus::RESERVED;
    }

    public function canBeReserved()
    {
        return $this->lastStatus?->status !== BookReserveStatus::RESERVED;
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function statuses()
    {
        return $this->hasMany(BookReserve::class, 'book_id');
    }

    public function lastStatus()
    {
        return $this->hasOne(BookReserve::class, 'book_id')->latestOfMany();
    }
}
