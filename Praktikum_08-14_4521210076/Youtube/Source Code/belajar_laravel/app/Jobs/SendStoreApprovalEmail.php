<?php

namespace App\Jobs;

use App\Models\Store;
use App\Mail\StoreApprovalMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendStoreApprovalEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $store;
    protected $status;

    public function __construct(Store $store, string $status)
    {
        $this->store = $store;
        $this->status = $status;
    }

    public function handle(): void
    {
        Mail::to($this->store->user->email)
            ->send(new StoreApprovalMail($this->store, $this->status));
    }
}