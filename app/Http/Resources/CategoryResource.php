<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => $this->tasks->map(function($task) {
                return [
                    'name' => $task->name,
                    'description' => $task->description
                   
                ];
            }),
            // outros atributos da categoria
        ];
    }
}
