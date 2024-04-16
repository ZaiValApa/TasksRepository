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
            'estado_name' => $this->estado_name,
            'estado_key' => $this->estado,
            'urgencia_name' => $this->urgencia_name,
            'urgencia_key' => $this->urgencia,
        ];
    }
}
