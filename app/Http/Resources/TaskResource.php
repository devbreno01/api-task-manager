<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $hours = floor($this->total_time_task / 3600);
        $minutes = floor(($this->total_time_task % 3600) / 60);
        $days = floor($this->total_time_task / 86400);
        $dataFormated = sprintf(
            '%d dias, %d horas, %d minutos, %d segundos',
            $days,
            $hours,
            $minutes,
            $this->total_time_task
        );
        return [
            'Responsavel' => [
                'nome' => $this->user->name,
                'email' => $this->user->email,
            ],
            'Categoria' => [
                'nome' => $this->category->name,
            ],
            'Tarefa' => $this->name,
            'descrição' => $this->description,
            'início' => Carbon::parse($this->beggining)->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s'),
            'fim' => Carbon::parse($this->finishing)->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s'),
            'inicio pausa' => Carbon::parse($this->break_began)->format('d/m/Y H:i:s') ?? null,
            'fim pausa' => Carbon::parse($this->break_finished)->format('d/m/Y H:i:s') ?? null,
            "total tempo gasto" => $dataFormated
        ];
    }
}
