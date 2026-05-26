<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #f59e0b; color: white; padding: 30px 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; }
        .body { padding: 28px 24px; text-align: center; }
        .alert-big { background: #fff7ed; border: 2px solid #f59e0b; border-radius: 12px; padding: 20px; margin: 20px 0; }
        .alert-big p { margin: 0; color: #92400e; font-size: 16px; font-weight: bold; }
        .queue-number { font-size: 40px; font-weight: bold; color: #f59e0b; display: block; margin: 10px 0; }
        .footer { background: #f9f9f9; padding: 16px 24px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚡ Segera Menuju Lokasi!</h1>
        </div>
        <div class="body">
            <p style="color:#555; font-size:15px;">Halo <strong>{{ $queue->owner_name }}</strong>!</p>
            <p style="color:#666; font-size:14px;">Giliranmu <strong>hampir tiba</strong>! Nomor yang sedang dilayani sekarang adalah 1 nomor sebelum kamu.</p>

            <div class="alert-big">
                <p>Nomor antrianmu</p>
                <span class="queue-number">{{ $queue->queue_number }}</span>
                <p>Segera datang ke lokasi kami sekarang! 🏃</p>
            </div>

            <p style="color:#888; font-size:13px;">Layanan: <strong>{{ $queue->service_label }}</strong></p>
            <p style="color:#888; font-size:13px;">Jika kamu tidak hadir, nomormu akan di-skip oleh admin.</p>
        </div>
        <div class="footer">
            PetCare Queue &bull; {{ config('app.url') }}
        </div>
    </div>
</body>
</html>
