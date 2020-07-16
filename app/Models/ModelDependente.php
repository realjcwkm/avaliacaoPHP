<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDependente extends Model
{
    protected $table='dependentes';
    public $timestamps = false;
    public function relPessoa(){
        return $this->hasOne('App\Models\ModelPessoa', 'id', 'id_pessoa');
    }
}
