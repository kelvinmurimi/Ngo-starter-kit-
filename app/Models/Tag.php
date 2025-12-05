<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        // 'user_id',
    ];
    // A tag can have many articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
