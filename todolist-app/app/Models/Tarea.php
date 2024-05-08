<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarea extends Model
{
    use HasFactory, SoftDeletes;

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
        'urgencia',
        'user_id'
    ];

    protected $casts = [
        'estado' => 'integer',
        'urgencia' => 'integer',
        'user_id' => 'integer',
    ];

    protected $appends = ['estado_name', 'urgencia_name'];

    public static function getPriorities()
    {
        return [['key' => self::LOW, 'value' => 'Bajo'], ['key' => self::MEDIUM, 'value' => 'Medio'], ['key' => self::HIGH, 'value' => 'Alto']];
    }

    public static function getStatuses()
    {
        return [['key' => self::WAITING, 'value' => 'En espera'], ['key' => self::PROCESSING, 'value' => 'En proceso'], ['key' => self::COMPLETED, 'value' => 'Completada']];
    }

    public function getEstadoNameAttribute()
    {
        return collect(self::getStatuses())->firstWhere('key', $this->estado)['value'];
    }

    public function getUrgenciaNameAttribute()
    {
        return collect(self::getPriorities())->firstWhere('key', $this->urgencia)['value'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
