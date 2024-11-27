<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'perfils';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'perfil',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class);
    }
}
