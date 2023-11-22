<?php

namespace App\Domains\Sports\Services;

use App\Domains\Sports\Models\Sport;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class SportService
{
    public function list()
    {
        return Sport::query()->paginate(20);
    }

    public function get(int $id): Sport
    {
        return Sport::where('id', $id)->firstOrFail();
    }

    public function create(array $data): Sport
    {
        return Sport::create($data);
    }

    public function update(array $data, int $id): Sport
    {
        $sport = Sport::findOrFail($id);
        $sport->update($data);

        return $sport;
    }

    public function delete(int $id): void
    {
        $Sport = Sport::findOrFail($id);
        $Sport->delete();
    }
}
