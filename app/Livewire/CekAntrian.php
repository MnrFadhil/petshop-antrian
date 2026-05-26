<?php

namespace App\Livewire;

use App\Models\Queue;
use Livewire\Component;

class CekAntrian extends Component
{
    public string $queue_number = '';
    public ?Queue $queue = null;
    public bool $searched = false;
    public ?string $error = null;

    protected array $rules = [
        'queue_number' => 'required|min:3|max:20',
    ];

    protected array $messages = [
        'queue_number.required' => 'Nomor antrian wajib diisi.',
    ];

    public function cek(): void
    {
        $this->validate();

        $this->queue = Queue::where('queue_number', strtoupper($this->queue_number))->first();
        $this->error = $this->queue ? null : 'Nomor antrian tidak ditemukan.';
        $this->searched = true;
    }

    public function getPositionProperty(): int
    {
        if (!$this->queue || $this->queue->status !== 'waiting') {
            return 0;
        }
        return Queue::where('status', 'waiting')
            ->where('created_at', '<=', $this->queue->created_at)
            ->count();
    }

    public function getServingNowProperty(): ?Queue
    {
        return Queue::getActiveQueue();
    }

    public function render()
    {
        return view('livewire.cek-antrian');
    }
}
