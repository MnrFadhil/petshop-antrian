<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #4f7942; color: white; padding: 30px 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; }
        .header p { margin: 6px 0 0; opacity: 0.85; font-size: 14px; }
        .body { padding: 28px 24px; }
        .queue-number { background: #f0f7ee; border: 2px dashed #4f7942; border-radius: 10px; padding: 20px; text-align: center; margin-bottom: 20px; }
        .queue-number .label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 1px; }
        .queue-number .number { font-size: 48px; font-weight: bold; color: #4f7942; line-height: 1.1; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 0; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
        .info-table td:first-child { color: #888; width: 40%; }
        .info-table td:last-child { font-weight: 600; color: #333; }
        .alert { background: #fff8e1; border-left: 4px solid #ffc107; padding: 12px 16px; border-radius: 4px; font-size: 13px; color: #555; margin-bottom: 20px; }
        .footer { background: #f9f9f9; padding: 16px 24px; text-align: center; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🐾 Antrian Terdaftar!</h1>
            <p>PetCare Queue System</p>
        </div>
        <div class="body">
            <p style="color:#555; font-size:15px;">Halo <strong>{{ $queue->owner_name }}</strong>,</p>
            <p style="color:#666; font-size:14px;">Pendaftaran antrian kamu berhasil. Berikut nomor antrianmu:</p>

            <div class="queue-number">
                <div class="label">Nomor Antrian</div>
                <div class="number">{{ $queue->queue_number }}</div>
            </div>

            <table class="info-table">
                <tr>
                    <td>Layanan</td>
                    <td>{{ $queue->service_label }}</td>
                </tr>
                <tr>
                    <td>Jenis Hewan</td>
                    <td>{{ $queue->pet_type }}</td>
                </tr>
                @if($queue->notes)
                <tr>
                    <td>Catatan</td>
                    <td>{{ $queue->notes }}</td>
                </tr>
                @endif
                <tr>
                    <td>Antrian di Depan</td>
                    <td>{{ $totalAhead }} orang</td>
                </tr>
            </table>

            <div class="alert">
                ⏳ Kami akan mengirim email lagi saat <strong>giliranmu tinggal 1 nomor</strong> lagi. Harap standby dan segera menuju lokasi ketika menerima notifikasi berikutnya.
            </div>

            <p style="font-size:13px; color:#888; text-align:center;">Kamu juga bisa cek posisi antrian di website kami kapan saja.</p>
        </div>
        <div class="footer">
            PetCare Queue &bull; {{ config('app.url') }}
        </div>
    </div>
</body>
</html>
