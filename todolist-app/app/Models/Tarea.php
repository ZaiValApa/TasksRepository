<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    //prioridades
    public const LOW = 1;
    public const MEDIUM = 2;
    public const HIGH = 3;

    //estatus
    public const WAITING = 1;
    public const PROCESSING = 2;
    public const COMPLETED = 3;

    protected $fillable = [
       'tarea',
       'descripcion',
       'estado',
       'urgencia'
    ];

    public static function getPriorities()
    {
        return[
            self::HIGH => 'Alta',
            self::MEDIUM => 'Media',
            self::LOW => 'Baja'
        ];
    }

    public static function getStatuses()
    {
        return[
            self::WAITING => 'En espera',
            self::PROCESSING => 'En proceso',
            self::COMPLETED => 'Completada'
        ];
    }
}
