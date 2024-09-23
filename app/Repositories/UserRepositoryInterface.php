<?php 

namespace App\Repositories;

interface UserRepositoryInterface{
    public function store($request);
    public function show($id); 
    public function showAll();
    public function update($validatedData, int $id); 
    public function destroy(int $id);
}