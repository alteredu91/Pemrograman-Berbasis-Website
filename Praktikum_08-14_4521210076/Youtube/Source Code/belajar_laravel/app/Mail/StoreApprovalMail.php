<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoreApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $store;
    public $status;

    public function __construct(Store $store, string $status)
    {
        $this->store = $store;
        $this->status = $status;
    }

    public function build()
    {
        return $this->view('emails.store-approval')
                    ->subject("Store {$this->status}: {$this->store->name}");
    }
}