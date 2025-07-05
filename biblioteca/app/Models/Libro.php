<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['titulo', 'autor', 'categoria', 'stock'];
}
