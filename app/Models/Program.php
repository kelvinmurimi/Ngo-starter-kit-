<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'featured_image',
        'user_id',
        'excerpt',
        'contents',
        'tag_id',
        'status',
    ];



}
