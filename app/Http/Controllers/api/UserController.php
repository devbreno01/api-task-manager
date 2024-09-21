<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Mockery\Exception;


class UserController extends Controller
{

    public function store(StoreUserRequest $request)
    {

        if($validateData = $request->validated()) {
            $userInsert = User::create($request->all());
            if(!$userInsert) {
                return response()->json(["Message" => "Erro ao tentar cadastrar responsavel no banco de dados"],400);
            }
            return response()->json(["success" => true, "Message" => "Responsável criado com sucesso" ,"data" => $validateData],201);
        } else {
            return response()->json([ "Message" => "Erro ao tentar cadastrar responsavel no banco de dados"],400);
        }

    }
    public function show(int $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(["message" => "Responsável não encontrado"], 404);
        }

        return response()->json(["Responsável encontrado" => $user],200);
    }

    public function showAll()
    {
        $users = User::paginate(2);
        if(!$users){
            return response()->json(["message" => "Não existe responsáveis cadastrados no sistema"], 404);
        }
        return  response()->json(['users' => $users]);
    }


    public function update(StoreUserRequest $request, int $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(["message" => "Responsável não encontrado"], 404);
        }

        $user->update($request->all());
        return response()->json(["message" => "Responsável atualizado com sucesso","user" => $user], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(["message" => "Responsável não encontrado"]);
        }
        $user->delete();
        return response()->json(["message" => "Responsável deletado com sucesso"], 200);
    }
}
