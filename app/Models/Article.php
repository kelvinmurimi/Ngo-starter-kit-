<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'tag_id',
        'status',
        'excerpt',
        'featured_image',
    ];

    // An article belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An article belongs to a tag
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
