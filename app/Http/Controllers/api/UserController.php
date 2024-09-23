<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private $service; 

    public function __construct(UserService $service)
    {
        $this->service = $service; 
    }

    public function store(StoreUserRequest  $request)
    {
        return $this->service->store($request);
    }
    public function show(int $id)
    {
        return $this->service->show($id);
    }

    public function showAll()
    {
        return $this->service->showAll();
    }

    public function update(StoreUserRequest $request, int $id)
    {
        return $this->service->update($request,$id);
    }

    public function destroy(int $id)
    {
        return $this->service->destroy($id);
    }
}
