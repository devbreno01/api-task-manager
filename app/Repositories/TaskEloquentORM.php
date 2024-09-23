<?php 
namespace App\Repositories; 
use App\Models\Task; 
use Carbon\Carbon;

class TaskEloquentORM implements TaskRepositoryInterface{

    private $taskModel;
    public function __construct(Task $task)
    {
        $this->taskModel = $task; 
    }

    public function store($validatedData){
        return $this->taskModel->create($validatedData);
    }
    public function show(int $id){
        return $this->taskModel->with('user', 'category')->find($id);
    }
    public function showAll(){
        return $this->taskModel->with('user','category')->paginate(2);
    }
    public function update($validatedData, int $id){ 
        $task = $this->taskModel->find($id);
       
        if($task) {
            return $task->update($validatedData);
        }
    }
    public function destroy(int $id){
        $task = $this->taskModel->find($id);
       
        if($task){
            return $task->delete();
        }
    }
   public function findById($id)
   {
        $task = $this->taskModel->find($id);
        if($task){
            return $task;
        }
   }

   public function save($task)
   {
        return $task->save();
   }
}