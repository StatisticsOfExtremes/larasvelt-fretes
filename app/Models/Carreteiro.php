<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carreteiro extends Model
{
    use HasFactory;

    protected $table = 'carreteiros';



    protected $fillable = [
        'nome',
        'cpf',
        'telefone'
    ];

    protected $guarded = ['id', 'data_criacao', 'ultima_modificacao'];

    /*
     * The veiculos that belong to the Carreteiro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function veiculos(): BelongsToMany
    {
        return $this->belongsToMany(Veiculo::class, 'carreteiro_veiculo')
        ->withPivot('ativo');
    }

}
