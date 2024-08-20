<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carne extends Model
{
    public const PERIODICIDADE_MENSAL = 'mensal';
    public const PERIODICIDADE_SEMANAL = 'semanal';

    use HasFactory;
    protected $table = 'carnes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'valor_total',
        'valor_entrada',
        'qtd_parcelas',
        'data_primeiro_vencimento',
        'periodicidade'
    ];

    public function parcelas()
    {
        return $this->hasMany(Parcela::class);
    }
}
