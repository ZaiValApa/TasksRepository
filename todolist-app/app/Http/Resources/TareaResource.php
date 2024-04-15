<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'tarea' => $this->tarea,
            'descripcion' => $this->descripcion,
            'estado' => (string) $this->formatEstado($this->estado),
            'estado_key' => $this->estado,
            'urgencia' => (string)  $this->formatUrgencia($this->urgencia),
            'urgencia_key' => $this->urgencia,
        ];
    }

    private function formatEstado($estado)
    {
        // Lógica para convertir el número de estado en una cadena descriptiva

        return match ($estado) {
            1 => 'En espera',
            2 => 'En proceso',
            3 => 'Completada',
            default => 'Desconocido',
        };
    }

    private function formatUrgencia($urgencia)
    {
        // Lógica para convertir el número de urgencia en una cadena descriptiva

        return match ($urgencia) {
            1 => 'Alta',
            2 => 'Media',
            3 => 'Baja',
            default => 'Desconocido',
        };
    }

}
