<?php 

namespace App\Repositories;

interface CategoryRepositoryInterface {
    public function store($validatedData);
    public function show(int $id); 
    public function showAll();
    public function update($validatedData, int $id); 
    public function destroy(int $id);
}