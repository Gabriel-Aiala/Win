<?php

namespace App\Domains\Subscriptions\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class SubscriptionResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'plan_id' => $this->plan_id,
            'cancelled' => $this->cancelled,
            'last_payment' => $this->last_payment,
        ];
    }
}