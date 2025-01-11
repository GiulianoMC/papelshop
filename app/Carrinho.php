<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{

    protected $fillable = ['user_id', 'material_id'];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}