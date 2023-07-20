<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $table = 'articals';
    protected $fillable = [
        'artical_name',
        'artical_desc',
        'artical_source'
    ];
}
