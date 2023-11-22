<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Models\InvestidorType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;


class InvestidorTypeService
{

    public function list()
    {
        return InvestidorType::query()->paginate();
    }

    public function get(int $id): InvestidorType
    {
        return InvestidorType::findOrFail($id);
    }

    public function create(array $data): InvestidorType
    {
        return InvestidorType::create($data);
    }

    public function update(array $data, int $id): InvestidorType
    {
        $InvestidorType = InvestidorType::findOrFail($id);
        $InvestidorType->update($data);

        return $InvestidorType;
    }

    public function delete(int $id): void
    {
        $InvestidorType = InvestidorType::findOrFail($id);
        $InvestidorType->delete();
    }
}