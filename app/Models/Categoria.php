<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'fk_categoria');
    }
}
