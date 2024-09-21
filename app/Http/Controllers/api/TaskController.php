<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TaskController extends Controller
{
    public function store(StoreTaskRequest $request){
        if($validatedData = $request->validated()){
            $taskCreated = Task::create($validatedData);

            if(!$taskCreated){
                return response()->json(["message" => "Erro ao tentar tarefa"],401);
            }
            return response()->json(["sucess" => true,
                "message" => "Tarefa adicionada com sucesso!",
                "informações" => $taskCreated], 201);
        }

    }

    public function update(StoreTaskRequest $request, int $id){
        $task = Task::find($id);
        if($validatedData = $request->validated()){
            $taskUpdated = $task->update($validatedData);
            if(!$taskUpdated){
                return response()->json(["message" => "Erro ao tentar atualizar tarefa tarefa"],500);
            }
            return response()->json(["sucess" => true,'message' => "Tarefa atualizada com sucesso!",
                "informações" => $task],200);
        }
    }

    public function show(int $id){
        $task = Task::with('user', 'category')->find($id);
        if(!$task){
            return response()->json(["message" => "Falha para encontrar tarefa"],404);
        }
        return new TaskResource($task);
    }

    public function showAll(){
        $tasks =  Task::with('user','category')->paginate(2);
        if(!$tasks){
            return response()->json(["message" => "Falha para encontrar tarefa"],404);
        }
        return TaskResource::collection($tasks);

    }

    public function destroy(int $id){
        $task = Task::find($id);
        if(!$task){
            return response()->json(["message" => "Falha para encontrar tarefa para exclusão"],404);
        }
        $taskDeleted = $task->delete();
        if(!$taskDeleted){
            return response()->json(["message" => "Falha na exclusão"],500);
        }
        return response()->json(["sucess" => true,"message" => "Tarefa deletada com sucesso!"],200);
    }

    public function startTask(int $id){
        $task = Task::find($id);
        if($task->status === true){
            return response()->json(["message" => "Tarefa já foi inicializada",],400);
        }
        if(!empty($task->finishing)){
            return response()->json(["Tarefa já foi finalizada" => false,],400);
        }

        $task->beggining = Carbon::now();
        $task->status = true;
        $task->save();
        return response()->json(["message" => 'Tarefa inicializada',
                                'name' => $task->name], 200);

    }
    public function pauseTask(int $id){
        $task = Task::find($id);
        //não pode pausar uma tarefa se ela já foi finalizada
        if(!empty($task->finishing)){
            return response()->json(["message" => "Tarefa  já foi finalizada",],400);
        }
        //não pode pausar uma tarefa se ela não foi iniciada
        if($task->status === true && !empty($task->beggining)){
            $task->break_began = Carbon::now();
            $task->status = false;
            $task->save();
            return response()->json(["message" => "Tarefa  foi pausada",
                "name" => $task->name,
                "data" => $task->break_began],200);

        } elseif(!empty($task->beggining)){
            return response()->json(["message" => "Tarefa já foi pausada",],400);
        } else{
            return response()->json(["message" => "Tarefa não foi inicializada",],400);
        }


    }
    public function unpauseTask(int $id){
        $task = Task::find($id);

        //não pode despausar uma tarefa não foi inicializada
        if($task->status === true || empty($task->beggining)){
            return response()->json(["message" => "Tarefa não foi iniciada"],400);
        }
        //não pode despausar uma tarefa se não foi pausada
        if(empty($task->break_began)){
            return response()->json(["message" => "Tarefa não foi pausada"],400);
        }
        $task->status = true;
        $task->break_finished = Carbon::now();
        $task->save();
        return response()->json(["message" => "Tarefa  foi despausada",
            "data" => $task->break_finished],200);

    }

    public function finishTask(int $id){
        $task = Task::find($id);

        if(empty($task->beggining)){
            return response()->json(["message" => "Tarefa não foi iniciada"],500);

        }
        if(!empty($task->break_began)){
            if(empty($task->break_finished)){
                return response()->json(["message" => "Tarefa está pausada, necessário despausa-la para finalizar"],500);
            }
        }

        if(!empty($task->finishing)){
            return response()->json(["message" => "Tarefa já foi finalizada"],500);
        }

        $task->finishing = Carbon::now();
        $task->status = false;
        $task->save();

        $beggining = Carbon::parse($task->beggining);
        $finishing = Carbon::parse($task->finishing);


        $timeSpent = $beggining->diffInSeconds($finishing);


        $hours = floor($timeSpent / 3600);
        $minutes = floor(($timeSpent % 3600) / 60);
        $seconds = $timeSpent % 60;


        $task->total_time_task = $timeSpent;
        $task->save();

        $dataFormated = sprintf(
            '%d dias, %d horas, %d minutos, %d segundos',
            $beggining->diffInDays($finishing),
            $hours,
            $minutes,
            $seconds
        );

        return response()->json([
            "message" => "Tarefa finalizada",
            "Historico da tarefa" => [
                "tempo gasto" => $dataFormated
            ]
        ], 200);

    }
}
