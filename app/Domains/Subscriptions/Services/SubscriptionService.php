<?php

namespace App\Domains\Subscriptions\Services;

use App\Domains\Subscriptions\Models\Subscription;
use App\Domains\Users\Services\UserService;

class SubscriptionService
{
    public function list()
    {
        return Subscription::query()->paginate(20);
    }

    public function get(int $id): Subscription
    {
        
        return Subscription::where('id', $id)->firstOrFail();
    }

    public function getByUserId(int $id): Subscription
    {
        return Subscription::where('user_id', $id)->firstOrFail();
    }

    public function create(array $data): Subscription
    {
        return Subscription::create($data);
    }

    public function update(array $data, int $id): Subscription
    {
        $Subscription = Subscription::findOrFail($id);
        $Subscription->update($data);

        return $Subscription;
    }

    public function delete(int $id): void
    {
        $Subscription = Subscription::findOrFail($id);
        $Subscription->delete();
    }
}
