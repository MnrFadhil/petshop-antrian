<?php

namespace App\Console\Commands;

use App\Models\Queue;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('queue:expire-serving')]
#[Description('Hanguskan antrian yang sudah dipanggil namun tidak hadir dalam 2 jam')]
class ExpireServingQueues extends Command
{
    public function handle(): void
    {
        $expired = Queue::where('status', 'serving')
            ->whereNotNull('serving_at')
            ->where('serving_at', '<=', now()->subHours(2))
            ->get();

        foreach ($expired as $queue) {
            $queue->update(['status' => 'skipped']);
            $this->line("Antrian {$queue->queue_number} ({$queue->owner_name}) hangus.");
        }

        if ($expired->isEmpty()) {
            $this->line('Tidak ada antrian yang hangus.');
        }
    }
}
