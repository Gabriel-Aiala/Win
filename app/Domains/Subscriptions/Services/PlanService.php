<?php

namespace App\Domains\Subscriptions\Services;

use App\Domains\Subscriptions\Models\Plan;

class PlanService
{
    public function list()
    {
        return Plan::query()->paginate(20);
    }

    public function get(int $id): Plan
    {
        return Plan::where('id', $id)->firstOrFail();
    }

    public function create(array $data): Plan
    {
        return Plan::create($data);
    }

    public function update(array $data, int $id): Plan
    {
        $plan = Plan::findOrFail($id);
        $plan->update($data);

        return $plan;
    }

    public function delete(int $id): void
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
    }
}
