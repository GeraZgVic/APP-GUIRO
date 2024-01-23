<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'cantidad'
    ];

    use HasFactory;


    // Un producto pertenece a una categoria
    public function categoria() :BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
