<?php

namespace App\Domains\Subscriptions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Subscriptions\Services\SubscriptionService;
use App\Domains\Subscriptions\Resources\SubscriptionResource;

class SubscriptionController extends Controller
{
    private SubscriptionService $service;

    public function __construct(SubscriptionService $service)
    {
        $this->service = $service;
    }

    public function list()
    {
       return ($this->service->list());
    }

    public function get($id){
        return new SubscriptionResource($this->service->get($id));
    }
    
    public function getByUserId(Request $request){
        return new SubscriptionResource($this->service->get($request->user()->id));
    }

    public function create(Request $request){
        return new SubscriptionResource($this->service->create($request->all()));
    }
    
    public function update(Request $request,$id){
        return new SubscriptionResource($this->service->update($request->all(),$id));
    }
    
    public function delete($id){
        return $this->service->delete($id);
    }

    

}