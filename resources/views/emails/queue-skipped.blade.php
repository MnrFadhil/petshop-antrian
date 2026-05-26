<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #dc2626; color: white; padding: 30px 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; }
        .body { padding: 28px 24px; text-align: center; }
        .icon { font-size: 60px; margin-bottom: 12px; }
        .info-box { background: #fef2f2; border: 2px solid #fca5a5; border-radius: 10px; padding: 20px; margin: 20px 0; }
        .info-box p { margin: 0; color: #991b1b; font-size: 15px; line-height: 1.7; }
        .queue-number { font-size: 36px; font-weight: bold; color: #dc2626; display: block; margin: 6px 0; }
        .cta { background: #16a34a; color: white; text-decoration: none; display: inline-block; padding: 12px 28px; border-radius: 8px; font-size: 15px; font-weight: bold; margin: 16px 0; }
        .footer { background: #f9f9f9; padding: 16px 24px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>❌ Antrian Anda Hangus</h1>
        </div>
        <div class="body">
            <div class="icon">😔</div>
            <p style="color:#555; font-size:15px;">Halo <strong>{{ $queue->owner_name }}</strong>,</p>
            <p style="color:#666; font-size:14px; line-height:1.7;">
                Kami informasikan bahwa antrian Anda dengan nomor
            </p>

            <span class="queue-number">{{ $queue->queue_number }}</span>

            <div class="info-box">
                <p>
                    Antrian Anda telah <strong>hangus</strong> karena sudah dipanggil
                    namun Anda tidak hadir di toko dalam waktu yang ditentukan.<br><br>
                    Silakan <strong>daftar antrian kembali</strong>.<br>
                    Kami tetap menunggu Anda dengan senang hati. 🙏
                </p>
            </div>

            <p style="color:#888; font-size:13px;">Layanan: <strong>{{ $queue->service_label }}</strong></p>

            <a href="{{ config('app.url') }}" class="cta">Daftar Antrian Lagi</a>

            <p style="font-size:12px; color:#aaa; margin-top:16px;">
                Terima kasih atas pengertian Anda. Sampai jumpa di PetCare! 🐾
            </p>
        </div>
        <div class="footer">
            PetCare Queue &bull; {{ config('app.url') }}
        </div>
    </div>
</body>
</html>
