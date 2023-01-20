<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'arriendo',
        'venta',
        'estado',
        'baños',
        'tipo',
        'construido',
        'terreno',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
