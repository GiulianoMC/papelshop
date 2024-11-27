<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\Masks;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\IsTrue;

class Pessoa extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, Masks;

    public $table = 'pessoas';

    protected $dates = [
        'data_base',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TIPO_RADIO = [
        'PF' => 'Física',
        'PJ' => 'Jurídica',
    ];

    protected $fillable = [
        'id',
        'cpfcnpj',
        'nome',
        'tipo',
        'email',
        'fone',
        'celular',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'uf',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function perfils()
    {
        return $this->belongsToMany(Perfil::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getCpfCnpjAttribute($value)
    {
        return $this->formataCpfCnpj($value,true);
    }

    public function setCpfCnpjAttribute($value)
    {
        $this->attributes['cpfcnpj'] = $value ? preg_replace('/[^0-9]/', '', $value) : null;
    }

}
