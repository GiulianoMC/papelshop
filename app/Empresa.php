<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Empresa extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'empresas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TIPO_RADIO = [
        'EE' => 'EMPRESA EXEMPLO',
    ];

    protected $fillable = [
        'id',
        'tipo',
        'pessoa_id',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}
