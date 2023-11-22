<?php

namespace App\Domains\Users\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Resources\PaginationResourceCollection;
use App\Domains\Users\Services\UserService;
use App\Domains\Users\Resources\UserDashboardResource;
use App\Domains\Users\Resources\UserResource;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
       return $this->service->list();
    }

    public function get($id){
        return new UserResource($this->service->get($id));
    }
    
    public function getByEmail($email){
        return new UserResource($this->service->get($email));
    }

    public function register(Request $request){
        return new UserResource($this->service->register($request->all()));
    }

}