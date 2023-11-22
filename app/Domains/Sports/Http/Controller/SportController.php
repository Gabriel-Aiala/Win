<?php

namespace App\Domains\Sports\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Resources\PaginationResourceCollection;
use App\Domains\Sports\Services\SportService;
use App\Domains\Sports\Resources\SportsResource;

class SportController extends Controller
{
    private SportService $service;

    public function __construct(SportService $service)
    {
        $this->service = $service;
    }

    public function list()
    {
       return ($this->service->list());
    }

    public function get($id){
        return new SportsResource($this->service->get($id));
    }

    public function create(Request $request){
        return new SportsResource($this->service->create($request->all()));
    }
    
    public function update(Request $request,$id){
        return new SportsResource($this->service->update($request->all(),$id));
    }
    
    public function delete($id){
        return $this->service->delete($id);
    }

    

}