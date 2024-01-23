<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
  protected $fillable = [
    'categoria'
  ];

  use HasFactory;

  // Una categoria tiene muchos productos (UNO A MUCHOS)
  public function productos() : HasMany
  {
    return $this->hasMany(Producto::class);
  }

}
