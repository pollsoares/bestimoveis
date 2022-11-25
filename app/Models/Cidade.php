<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    //protected $table = 'tb_ibge'; caso o model tenha o nome diferente da tabela já existente
    //protected $primaryKey = 'chv_ibge' pois o laravel espera por padrão o nome da chave primaria como ID
    //public $timestamps = false; 'Caso a tabela não use timestamps, caso contrário use true;

    protected $fillable = ['nome'];


}
