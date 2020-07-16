<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['nome', 'data_nasc', 'email', 'url_foto'];
    public $timestamps = false;
    public function relDependentes()
    {
        return $this->hasMany('App\Models\ModelDependente', 'id_pessoa');
    }
}
