<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'email', 'telefone', 'dtnasc',
    ];

}
