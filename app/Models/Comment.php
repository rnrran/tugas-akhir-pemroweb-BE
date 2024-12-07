<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'blog_id',
    ];

    /**
     * Relasi dengan model User (Penulis Komentar).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan model Blog (Blog yang Dikomentari).
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
