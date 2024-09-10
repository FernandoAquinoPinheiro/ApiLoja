<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigoCliente';
    protected $fillable = [
        'tipoProduto',
        'valorProduto',
        'codigoClientefk',
    ];

    // public function produto()
    // {
    //     return $this->belongsTo(produto::class, 'codigoClientefk', 'codigoCliente');
    // }
}
