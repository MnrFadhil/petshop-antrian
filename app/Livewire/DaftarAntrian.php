<?php

namespace App\Livewire;

use App\Mail\QueueConfirmation;
use App\Mail\QueueEmpty;
use App\Models\Queue;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DaftarAntrian extends Component
{
    public string $owner_name = '';
    public string $email = '';
    public string $pet_type = '';
    public string $notes = '';
    public string $service = '';

    public bool $submitted = false;
    public ?string $queue_number = null;
    public bool $is_empty_queue = false;

    protected array $rules = [
        'owner_name' => 'required|min:2|max:100',
        'email'      => 'required|email|max:150',
        'pet_type'   => 'required|min:2|max:50',
        'service'    => 'required|in:grooming,vet',
        'notes'      => 'nullable|max:500',
    ];

    protected array $messages = [
        'owner_name.required' => 'Nama pemilik wajib diisi.',
        'owner_name.min'      => 'Nama minimal 2 karakter.',
        'email.required'      => 'Email wajib diisi.',
        'email.email'         => 'Format email tidak valid.',
        'pet_type.required'   => 'Jenis hewan wajib diisi.',
        'service.required'    => 'Pilih layanan terlebih dahulu.',
        'service.in'          => 'Layanan tidak valid.',
    ];

    public function submit(): void
    {
        $this->validate();

        $waitingCount = Queue::getWaitingCount();
        $serving = Queue::getActiveQueue();

        $queueNumber = Queue::generateQueueNumber();

        $queue = Queue::create([
            'queue_number' => $queueNumber,
            'owner_name'   => $this->owner_name,
            'email'        => $this->email,
            'pet_type'     => $this->pet_type,
            'notes'        => $this->notes,
            'service'      => $this->service,
            'status'       => 'waiting',
        ]);

        $isEmpty = ($waitingCount === 0 && $serving === null);

        try {
            if ($isEmpty) {
                Mail::to($this->email)->send(new QueueEmpty($queue));
            } else {
                Mail::to($this->email)->send(new QueueConfirmation($queue, $waitingCount + ($serving ? 1 : 0)));
            }
        } catch (\Exception $e) {
            // Email failure should not block queue registration
        }

        $this->queue_number = $queueNumber;
        $this->is_empty_queue = $isEmpty;
        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.daftar-antrian');
    }
}
