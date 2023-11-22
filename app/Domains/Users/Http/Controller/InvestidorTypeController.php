<?php

namespace App\Domains\Users\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Resources\PaginationResourceCollection;
use App\Domains\Users\Services\InvestidorTypeService;
use App\Domains\Users\Resources\InvestidorTypeResource;

class InvestidorTypeController extends Controller
{
    private InvestidorTypeService $service;

    public function __construct(InvestidorTypeService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
       return $this->service->list();
    }

    public function get($id):InvestidorTypeResource{
        return new InvestidorTypeResource($this->service->get($id));
    }

    public function create(Request $request):InvestidorTypeResource{
        return new InvestidorTypeResource($this->service->create($request->all()));
    }
    
    public function update(Request $request,$id):InvestidorTypeResource{
        return new InvestidorTypeResource($this->service->update($request->all(),$id));
    }
    
    public function delete($id){
        return $this->service->delete($id);
    }
    

}