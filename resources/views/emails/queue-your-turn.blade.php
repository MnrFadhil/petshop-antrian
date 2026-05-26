<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #16a34a; color: white; padding: 30px 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 6px 0 0; opacity: 0.85; font-size: 14px; }
        .body { padding: 28px 24px; text-align: center; }
        .queue-number { background: #f0fdf4; border: 3px solid #16a34a; border-radius: 12px; padding: 24px; margin: 20px 0; }
        .queue-number .label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 1px; }
        .queue-number .number { font-size: 56px; font-weight: bold; color: #16a34a; line-height: 1.1; }
        .alert-warning { background: #fff7ed; border: 2px solid #f97316; border-radius: 10px; padding: 16px 20px; margin: 20px 0; text-align: left; }
        .alert-warning p { margin: 0; color: #9a3412; font-size: 14px; line-height: 1.6; }
        .footer { background: #f9f9f9; padding: 16px 24px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🐾 Sekarang Giliran Anda!</h1>
            <p>PetCare Queue System</p>
        </div>
        <div class="body">
            <p style="color:#555; font-size:16px;">Halo <strong>{{ $queue->owner_name }}</strong>,</p>
            <p style="color:#666; font-size:14px; line-height:1.7;">
                Sekarang sudah saatnya antrian Anda.<br>
                Kami menunggu Anda di toko dengan rasa hormat. 🙏
            </p>

            <div class="queue-number">
                <div class="label">Nomor Antrian Anda</div>
                <div class="number">{{ $queue->queue_number }}</div>
            </div>

            <p style="color:#888; font-size:13px;">Layanan: <strong>{{ $queue->service_label }}</strong></p>

            <div class="alert-warning">
                <p>
                    ⚠️ <strong>Perhatian:</strong> Jika Anda tidak hadir di toko dalam waktu
                    <strong>2 jam</strong> sejak email ini dikirim, antrian Anda akan
                    <strong>hangus secara otomatis</strong> dan Anda perlu mendaftar antri kembali.
                </p>
            </div>

            <p style="font-size:13px; color:#888;">Terima kasih atas kepercayaan Anda kepada PetCare. Sampai jumpa di toko! 🐶🐱</p>
        </div>
        <div class="footer">
            PetCare Queue &bull; {{ config('app.url') }}
        </div>
    </div>
</body>
</html>
