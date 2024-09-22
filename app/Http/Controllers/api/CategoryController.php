<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function store(StoreCategoryRequest $request)
    {
       return  $this->service->store($request);
    }

    public function show(int $id)
    {
        return $this->service->show($id);
    }

    public function showAll (){
        return $this->service->showAll();
    }


    public function update(StoreCategoryRequest $request, int $id)
    {
      return $this->service->update($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->service->destroy($id); 
    }
}
