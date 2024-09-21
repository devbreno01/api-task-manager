<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class CategoryController extends Controller
{

    public function store(StoreCategoryRequest $request)
    {

        if($validatedCategory = $request->validated()){
            $categoryCreated = Category::create($validatedCategory);

            if(!$categoryCreated){
                return response()->json(["message" => "Falha na tentaiva de criar categoria", 400]);
            }
            return response()->json(["Message:" => "Categoria Criada com sucesso", "Categoria" => $categoryCreated], 201);
        }
    }

    public function show(int $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(["message" => "Categoria não encontrada"], 500);
        }
        return response()->json(["Categoria" => $category], 200);
    }

    public function showAll (){
        $categories = Category::paginate(2);
        if(!$categories){
            return response()->json(["message" => "Nenhum categoria encontrada"], 500);
        }
        return response()->json($categories, 200);
    }


    public function update(StoreCategoryRequest $request, int $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(["message" => "Categoria não encontrada"], 400);
        }
        if($validatedCategory = $request->validated()){
            $categoryUpdated = $category->update($validatedCategory);
            if(!$categoryUpdated){
                return response()->json(["message" => "Falha na tentaiva de editar categoria", 400]);
            }
            return response()->json(["message" => "Categoria Atualizada com sucesso", "Categoria" => $categoryUpdated], 200);
        }
    }

    public function destroy(int $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(["message" => "Categoria não encontrada"]);
        }
        $categoryDeleted = $category->delete();
        return response()->json(["message" => "Categoria deletada com sucesso"], 200);
    }
}
