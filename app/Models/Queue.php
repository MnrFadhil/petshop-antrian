<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'queue_number',
        'owner_name',
        'email',
        'pet_type',
        'notes',
        'service',
        'status',
        'serving_at',
    ];

    protected $casts = [
        'serving_at' => 'datetime',
    ];

    public static function generateQueueNumber(): string
    {
        $prefix = 'A';
        $latest = self::whereDate('created_at', today())
            ->orderByDesc('queue_number')
            ->value('queue_number');

        $next = $latest ? (int) substr($latest, 1) + 1 : 1;
        return $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
    }

    public static function getActiveQueue()
    {
        return self::where('status', 'serving')->first();
    }

    public static function getWaitingQueue()
    {
        return self::where('status', 'waiting')->orderBy('created_at')->get();
    }

    public static function getNextWaiting()
    {
        return self::where('status', 'waiting')->orderBy('created_at')->first();
    }

    public static function getWaitingCount(): int
    {
        return self::where('status', 'waiting')->count();
    }

    public function getServiceLabelAttribute(): string
    {
        return $this->service === 'grooming' ? 'Grooming' : 'Pemeriksaan Dokter';
    }

    public function getPositionInQueueAttribute(): int
    {
        return self::where('status', 'waiting')
            ->where('created_at', '<=', $this->created_at)
            ->count();
    }
}
