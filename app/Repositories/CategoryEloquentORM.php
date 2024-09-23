<?php

namespace App\Repositories; 
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryEloquentORM implements CategoryRepositoryInterface{

    private $categoryModel; 

    public function __construct(Category $category)
    {
        $this->categoryModel = $category; 
    }

    public function store($validatedData){
        return $this->categoryModel->create($validatedData);
    }

    public function show(int $id){
        return $this->categoryModel->with('tasks')->find($id);
    }

    public function showAll(){
        return $this->categoryModel->with('tasks')->paginate(2);
       
    }

    public function update($validatedData , int $id){
        $category = $this->categoryModel->find($id);
       
        if ($category) {
            return $category->update($validatedData);
        }
  
    }
    public function destroy(int $id){
        $category = $this->categoryModel->find($id);
       
        if ($category) {
            return $category->delete();
        }
    }
}