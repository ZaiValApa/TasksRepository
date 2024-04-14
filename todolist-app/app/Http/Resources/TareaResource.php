<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $statusDescription = match ($this->estado) {
            1 => 'En espera',
            2 => 'En proceso',
            3 => 'Completada',
            default => 'Desconocido',
        };

        $priorityDescription = match ($this->urgencia) {
            1 => 'Alta',
            2 => 'Media',
            3 => 'Baja',
            default => 'Desconocido',
        };

        return [
            'id' => $this->id,
            'tarea' => $this->tarea,
            'descripcion' => $this->descripcion,
            'estado' => (string) $statusDescription,
            'estado_key' => $this->estado,
            'urgencia' => (string) $priorityDescription,
            'urgencia_key' => $this->urgencia,
        ];
    }
}
