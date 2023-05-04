<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;



    protected $fillable = ['placa', 'antt', 'nome_dono', 'identificacao_dono'];


    /**
     * The carreteiros that belong to the Veiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carreteiros(): BelongsToMany
    {
        return $this->belongsToMany(Carreteiro::class, 'carreteiro_veiculo')
        ->withPivot('ativo');
    }
}
