<?php

namespace App\Observers;

use App\Models\Store;
use Illuminate\Support\Str;

class StoreObserver
{
    public function creating(Store $store): void
    {
        $store->slug = Str::slug($store->name);
        
        if ($store->user && $store->user->isPartner()) {
            $store->status = 'approved';
        } else {
            $store->status = 'pending';
        }
    }
}