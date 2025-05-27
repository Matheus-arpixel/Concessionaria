<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'veiculo_id',
        'funcionario_id',
        'data_venda',
        'valor_final',
        'forma_pagamento',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function veiculo() {
        return $this->belongsTo(Veiculo::class);
    }

    public function funcionario() {
        return $this->belongsTo(Funcionario::class);
    }
}
