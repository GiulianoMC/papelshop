<?php

namespace App\Traits;

use App\AuditLog;
use Illuminate\Database\Eloquent\Model;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function (Model $model) {
            self::audit('Inserido(a)', $model);
        });

        static::updated(function (Model $model) {
            self::audit('alterado(a)', $model);
        });

        static::deleted(function (Model $model) {
            self::audit('deletado(a)', $model);
        });
    }

    protected static function audit($description, $model)
    {
        AuditLog::create([
            'description'  => $description,
            'subject_id'   => $model->id ?? null,
            'subject_type' => get_class($model) ?? null,
            'user_id'      => auth()->id() ?? null,
            'properties'   => $model ?? null,
            'host'         => request()->ip() ?? null,
        ]);
    }
}
