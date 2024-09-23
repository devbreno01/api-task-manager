<?php 

namespace App\Services; 
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
class UserService {
    private $userRepository; 

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository; 
    }

    public function store(StoreUserRequest $request){

        if($validatedData = $request->validated()) {
            $userInsert = $this->userRepository->store($validatedData);
            if(!$userInsert) {
                return response()->json(["Message" => "Erro ao tentar cadastrar responsavel no banco de dados"],400);
            }
            return response()->json(["success" => true, "Message" => "Responsável criado com sucesso" ,"data" =>  [
                "name" => $userInsert->name,
                "email" => $userInsert->email,
                "id" => $userInsert->id
            ]],201);
        } else {
            return response()->json([ "Message" => "Erro ao tentar cadastrar responsavel no banco de dados"],400);
        }
    }

    public function show(int $id)
    {
        $user = $this->userRepository->show($id);
        if(empty($user)){
            return response()->json(["message" => "Responsável não encontrado"], 404);
        }

        return  response()->json(["data" =>  [
            "name" => $user->name,
            "email" => $user->email,
            "id" => $user->id
        ]],200);
    }

    public function showAll()
    {
        $users = $this->userRepository->showAll();
        if(empty($users)){
            return response()->json(["message" => "Não existe responsáveis cadastrados no sistema"], 404);
        }
        return  response()->json(["data" =>  [
                "name" => $users->name,
                "email" => $users->email,
                "id" => $users->id
            ]],200);
    }

    public function update(StoreUserRequest $request, int $id)
    {
        $user = $this->userRepository->update($request,$id);
        if(empty($user)){
            return response()->json(["message" => "Responsável não encontrado"], 404);
        }

        return response()->json(["message" => "Responsável atualizado com sucesso","user" => $user], 201);
    }

    public function destroy(int $id)
    {
        $user = $this->userRepository->destroy($id);
        if(empty($user)){
            return response()->json(["message" => "Responsável não encontrado"]);
        }
        return response()->json(["message" => "Responsável deletado com sucesso"], 200);
    }
}