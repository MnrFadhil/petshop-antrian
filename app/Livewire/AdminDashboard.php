<?php

namespace App\Livewire;

use App\Mail\QueueNotification;
use App\Mail\QueueSkipped;
use App\Mail\QueueYourTurn;
use App\Models\Queue;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AdminDashboard extends Component
{
    public bool $confirmSelesai = false;
    public bool $confirmSkip    = false;
    public string $tab           = 'live';
    public string $filterService = 'all';
    public string $filterStatus  = 'all';

    public function selesai(): void
    {
        $serving = Queue::getActiveQueue();
        if (!$serving) return;

        $serving->update(['status' => 'done']);
        $this->notifyNextInLine();
        $this->confirmSelesai = false;
    }

    public function skip(): void
    {
        $serving = Queue::getActiveQueue();
        if (!$serving) return;

        $serving->update(['status' => 'skipped']);

        try {
            Mail::to($serving->email)->send(new QueueSkipped($serving));
        } catch (\Exception $e) {
            // Silent fail
        }

        $this->notifyNextInLine();
        $this->confirmSkip = false;
    }

    public function mulaiLayani(): void
    {
        if (Queue::getActiveQueue()) return;

        $next = Queue::getNextWaiting();
        if (!$next) return;

        $next->update(['status' => 'serving', 'serving_at' => now()]);

        // Kirim QueueNotification ke #2 (QueueYourTurn sudah dikirim saat mereka jadi #1)
        $secondInLine = Queue::where('status', 'waiting')
            ->orderBy('created_at')
            ->first();

        if ($secondInLine) {
            try {
                Mail::to($secondInLine->email)->send(new QueueNotification($secondInLine));
            } catch (\Exception $e) {
                // Silent fail
            }
        }
    }

    private function notifyNextInLine(): void
    {
        $next = Queue::getNextWaiting();
        if (!$next) return;

        // Pelanggan ini naik jadi #1, kirim QueueYourTurn
        $this->sendYourTurnEmail($next);
    }

    public function logout(): void
    {
        session()->forget('admin_auth');
        $this->redirect('/admin/login');
    }

    private function sendYourTurnEmail(Queue $queue): void
    {
        try {
            Mail::to($queue->email)->send(new QueueYourTurn($queue));
        } catch (\Exception $e) {
            // Silent fail
        }
    }

    public function getTodayDoneCountProperty(): int
    {
        return Queue::whereIn('status', ['done', 'skipped'])
            ->whereDate('created_at', today())
            ->count();
    }

    public function render()
    {
        $historyQueues = Queue::query()
            ->when($this->filterService !== 'all', fn ($q) => $q->where('service', $this->filterService))
            ->when($this->filterStatus  !== 'all', fn ($q) => $q->where('status',  $this->filterStatus))
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.admin-dashboard', [
            'serving'       => Queue::getActiveQueue(),
            'waitingList'   => Queue::getWaitingQueue(),
            'historyQueues' => $historyQueues,
            'totalQueues'   => Queue::count(),
        ]);
    }
}
