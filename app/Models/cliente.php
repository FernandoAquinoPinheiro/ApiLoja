<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigoCliente';
    protected $fillable = [
        'nomeCliente',
        'nascCliente',
        'TelefoneCliente',
    ];

    //  public function cliente()
    //  {
    //      return $this->hasMany(cliente::class, 'codigoClientefk', 'codigoCliente');
    //  }
}
