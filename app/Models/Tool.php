<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $table = 'Tools';

    protected $fillable = [
        'title',
        'link',
        'description',
        'tags'
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}
