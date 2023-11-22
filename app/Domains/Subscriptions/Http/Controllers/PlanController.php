<?php

namespace App\Domains\Subscriptions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Subscriptions\Services\PlanService;
use App\Domains\Subscriptions\Resources\PlansResource;

class PlanController extends Controller
{
    private PlanService $service;

    public function __construct(PlanService $service)
    {
        $this->service = $service;
    }

    public function list()
    {
       return ($this->service->list());
    }

    public function get($id){
        return new PlansResource($this->service->get($id));
    }

    public function create(Request $request){
        return new PlansResource($this->service->create($request->all()));
    }
    
    public function update(Request $request,$id){
        return new PlansResource($this->service->update($request->all(),$id));
    }
    
    public function delete($id){
        return $this->service->delete($id);
    }

    

}