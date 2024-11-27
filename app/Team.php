<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'teams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'team_id', 'id');
    }

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'team_id', 'id');
    }

    public function aplicacaos()
    {
        return $this->hasMany(Aplicacao::class, 'team_id', 'id');
    }

    public function resgates()
    {
        return $this->hasMany(Resgate::class, 'team_id', 'id');
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class, 'team_id', 'id');
    }
}
