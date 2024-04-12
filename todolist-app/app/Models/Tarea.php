<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected $fillable = ['tarea', 'descripcion', 'estado', 'urgencia', 'user_id'];

    public static function getPriorities()
    {
        return [
            self::LOW => 'Baja',
            self::MEDIUM => 'Media',
            self::HIGH => 'Alta',
        ];
    }

    public static function getStatuses()
    {
            /* ['key' => self::WAITING, 'value' => 'En espera'],
            ['key' => self::PROCESSING, 'value' => 'En proceso'],
            ['key' => self::COMPLETED, 'value' => 'Completada']*/
        return [


            self::WAITING => 'En espera',
            self::PROCESSING => 'En proceso',
            self::COMPLETED => 'Completada',
        ];
    }
}
