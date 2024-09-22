<?php 

namespace App\Repositories;

interface TaskRepositoryInterface{
    public function store($validatedData);
    public function show(int $id); 
    public function showAll();
    public function update($validatedData, int $id); 
    public function destroy(int $id);
    public function findById($id); 
    public function save($task); 
}