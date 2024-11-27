<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Cliente extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'clientes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'pessoa_id',
        'gerente_id',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function gerente()
    {
        return $this->belongsTo(User::class, 'gerente_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getNomeAttribute()
    {
        return $this->pessoa->nome;
    }

    public function getUltimaOperacaoAttribute()
    {

        return (Operacao::where('cliente_id','=',$this->id)->count() != 0)
            ? Operacao::where('cliente_id','=',$this->id)->latest()->first()->data_aceite
            : '';
    }

    public function getClienteDesdeAttribute()
    {

        return (Operacao::where('cliente_id','=',$this->id)->count() != null)
            ? Operacao::where('cliente_id','=',$this->id)->first()->data_aceite
            : '';
    }

    public function getRiscoVencidoAttribute()
    {

        return (Titulo::where('data_liquidacao','=',null)
        ->where('data_vencimento','<',Carbon::parse(today())->format('Y-m-d'))
        ->whereHas('operacao', function ($query) {return $query->where('cliente_id', '=', $this->id);})
        ->sum('valor'));
    }

    public function getRiscoAvencerAttribute()
    {

        return (Titulo::where('data_liquidacao','=',null)
        ->where('data_vencimento','>=',Carbon::parse(today())->format('Y-m-d'))
        ->whereHas('operacao', function ($query) {return $query->where('cliente_id', '=', $this->id);})
        ->sum('valor'));
    }

    public function getPendenciasAttribute()
    {

        return (Pendencia::where('data_liquidacao','=',null)
        ->where('cliente_id', '=', $this->id)
        ->sum('valor'));
    }

    public function getRiscoTotalAttribute()
    {

        return (Titulo::where('data_liquidacao','=',null)
        ->whereHas('operacao', function ($query) {return $query->where('cliente_id', '=', $this->id);})
        ->sum('valor'));
    }

    public function getConfirmadoAttribute()
    {

        return (Titulo::where('data_liquidacao','=',null)
        ->where('status_confirmacao','=','N')
        ->whereHas('operacao', function ($query) {return $query->where('cliente_id', '=', $this->id);})
        ->sum('valor'));
    }

    public function getComProblemaAttribute()
    {

        return (Titulo::where('data_liquidacao','=',null)
        ->where('status_confirmacao','=','M')
        ->whereHas('operacao', function ($query) {return $query->where('cliente_id', '=', $this->id);})
        ->sum('valor'));
    }

    public function getPoliticaAttribute()
    {

        return (Titulo::where('data_liquidacao','=',null)
        ->where('status_confirmacao','=','L')
        ->whereHas('operacao', function ($query) {return $query->where('cliente_id', '=', $this->id);})
        ->sum('valor'));
    }

    public function getConfirmadoPercentualAttribute()
    {

        return (($this->risco_total > 0) && ($this->confirmado > 0))
            ? $this->confirmado / $this->risco_total * 100
            : 0;
    }

    public function getComProblemaPercentualAttribute()
    {

        return (($this->risco_total > 0) && ($this->com_problema > 0))
            ? $this->com_problema / $this->risco_total * 100
            : 0;
    }

    public function getPoliticaPercentualAttribute()
    {

        return (($this->risco_total > 0) && ($this->politica > 0))
            ? $this->politica / $this->risco_total * 100
            : 0;
    }

}
