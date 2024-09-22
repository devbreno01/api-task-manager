<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    private $service; 
    
    public function __construct(TaskService $taskService)
    {
        $this->service = $taskService;
    }

    public function store(StoreTaskRequest $request){
        return $this->service->store($request);
    }

    public function update(StoreTaskRequest $request, int $id){
        return $this->service->update($request,$id);
    }

    public function show(int $id){
        return $this->service->show($id);
    }

    public function showAll(){
        return $this->service->showAll();
    }

    public function destroy(int $id){
       return $this->service->destroy($id);
    }

    public function startTask(int $id){
       return $this->service->startTask($id); 

    }
    public function pauseTask(int $id){
        return $this->service->pauseTask($id);

    }
    public function unpauseTask(int $id){
        return $this->service->unpauseTask($id);
    }

    public function finishTask(int $id){
        return $this->service->finishTask($id);
    }
}
