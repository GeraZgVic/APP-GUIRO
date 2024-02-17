<?php

namespace App\Models;

use App\Models\Producto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CosteoProducto extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'producto_id',
        'precio_costo',
        'precio_venta',
        'porcentaje',
        'margen'
    ];

    // Un costeo pertenece a un producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}
