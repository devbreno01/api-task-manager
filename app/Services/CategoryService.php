<?php 

namespace App\Services;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Repositories\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;

class CategoryService {
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store(StoreCategoryRequest $request){
        if($validatedData = $request->validated()){
           // $categoryCreated = Category::create($validatedCategory);
           $categoryCreated =  $this->categoryRepository->store($validatedData);

            if(empty($categoryCreated)){
                return response()->json(["message" => "Falha na tentaiva de criar categoria"], 400);
                
            }
            return response()->json(["Message:" => "Categoria Criada com sucesso", "Categoria" => $categoryCreated], 201);

            
        }
    }
    public function show(int $id)
    {
        $category = $this->categoryRepository->show($id);
        if(empty($category)){
            return response()->json(["message" => "Categoria não encontrada"], 404);
        }
        return new CategoryResource($category);
        //return response()->json(['category' => $category]);
    }


    public function showAll(){
        $categories = $this->categoryRepository->showAll();
        
        if (empty($categories)) {
            return response()->json(["message" => "Nenhuma categoria encontrada"], 404);
        }
    
        return CategoryResource::collection($categories);
       
    }

    public function update(StoreCategoryRequest $request, int $id)
    {
        if($validatedData = $request->validated()){
          $categoryUpdated = $this->categoryRepository->update($validatedData, $id);
            if(empty($categoryUpdated)){
                return response()->json(["message" => "Falha na tentaiva de editar categoria", 400]);
            }
            return response()->json(["message" => "Categoria Atualizada com sucesso", "Categoria" => $categoryUpdated], 200);
        }
    }

    public function destroy(int $id)
    {
        $category = $this->categoryRepository->destroy($id);
        
        if(empty($category)){
            return response()->json(["message" => "Categoria não encontrada"]);
        }
        return response()->json(["message" => "Categoria deletada com sucesso"], 200);
    }


}
