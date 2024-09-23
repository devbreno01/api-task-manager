<?php 

namespace App\Repositories; 
use App\Models\User;

class UserEloquentORM implements UserRepositoryInterface{
    private $userModel; 

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    public function store($request){
        return $this->userModel->create($request);
    }
    public function show($id){
        return $this->userModel->find($id) ?? null;
    } 
    public function showAll(){
        return $this->userModel->all()->paginate(2);
    }
    public function update($validatedData, int $id){
        $user = $this->userModel->find($id); 

        if($user){
            return $user->update($validatedData);
        }
    } 
    public function destroy(int $id){
        $user = $this->userModel->find($id); 

        if($user){
            return $user->delete();
        }
    }
}