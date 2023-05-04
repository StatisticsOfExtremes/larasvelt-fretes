<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CarreteiroVeiculo extends Pivot
{
    //

    protected $table = 'carreteiro_veiculo';


    protected $fillable = ['ativo'];
    
}
