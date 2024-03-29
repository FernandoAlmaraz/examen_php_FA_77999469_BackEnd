<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'autor_id', 'lot', 'description', 'genre'];
    protected $table = 'libros';
}
