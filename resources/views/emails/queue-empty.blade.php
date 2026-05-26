<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #22c55e; color: white; padding: 30px 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; }
        .body { padding: 28px 24px; text-align: center; }
        .icon { font-size: 60px; margin-bottom: 12px; }
        .info-box { background: #f0fdf4; border: 1px solid #86efac; border-radius: 10px; padding: 20px; margin: 20px 0; }
        .info-box p { margin: 0; color: #15803d; font-size: 15px; font-weight: 600; }
        .footer { background: #f9f9f9; padding: 16px 24px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Antrian Kosong!</h1>
        </div>
        <div class="body">
            <div class="icon">🚀</div>
            <p style="color:#555; font-size:15px;">Halo <strong>{{ $queue->owner_name }}</strong>!</p>
            <p style="color:#666; font-size:14px;">Kabar baik! Saat ini <strong>tidak ada antrian</strong> di petshop kami.</p>

            <div class="info-box">
                <p>✅ Silakan langsung datang ke lokasi kami.<br>Kamu akan dilayani segera!</p>
            </div>

            <p style="color:#888; font-size:13px;">Nomor antrianmu: <strong>{{ $queue->queue_number }}</strong></p>
            <p style="color:#888; font-size:13px;">Layanan: <strong>{{ $queue->service_label }}</strong></p>

            <div style="background:#fff7ed; border:2px solid #f97316; border-radius:10px; padding:16px 20px; margin:20px 0; text-align:left;">
                <p style="margin:0; color:#9a3412; font-size:14px; line-height:1.6;">
                    ⚠️ <strong>Perhatian:</strong> Jika Anda tidak hadir di toko dalam waktu <strong>2 jam</strong> sejak email ini dikirim, antrian Anda akan <strong>hangus secara otomatis</strong> dan Anda perlu mendaftar antri kembali.
                </p>
            </div>
        </div>
        <div class="footer">
            PetCare Queue &bull; {{ config('app.url') }}
        </div>
    </div>
</body>
</html>
