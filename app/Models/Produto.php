<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $respository;
    protected $guarded = [];

    public function busca($busca = null)
    {
        $results = $this->where(function ($query) use ($busca) {
            if ($busca) {
                $query->where('nome', "LIKE", "%".$busca."%");
                $query->where('descricao', "LIKE", "%".$busca."%");
                $query->where('unidade', "LIKE", "%".$busca."%");
                $query->where('valor', "LIKE", "%".$busca."%");
            }
        }) //->toSql();
            ->paginate();
        return $results;
    }
}
