<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #667eea;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .info-box {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Konfirmasi Tiket Batam Campus Expo</h1>
        </div>
        <div class="content">
            <p>Halo <strong><?php echo e($user->name); ?></strong>,</p>
            
            <p>Pembelian tiket Anda telah dikonfirmasi! Berikut detail tiket Anda:</p>
            
            <div class="info-box">
                <p><strong>Kode Tiket:</strong> <?php echo e($ticket->ticket_code); ?></p>
                <p><strong>Status:</strong> Terkonfirmasi</p>
                <p><strong>Tanggal Konfirmasi:</strong> <?php echo e($ticket->confirmed_at->format('d F Y H:i')); ?></p>
            </div>
            
            <div class="qr-code">
                <p><strong>QR Code Anda:</strong></p>
                <?php if(isset($qrCodeBase64)): ?>
                    <img src="data:image/png;base64,<?php echo e($qrCodeBase64); ?>" alt="QR Code Tiket" style="max-width: 300px; height: auto; border: 2px solid #667eea; border-radius: 8px; padding: 10px; background: white;">
                <?php else: ?>
                    <p>QR Code terlampir dalam email ini sebagai file attachment.</p>
                <?php endif; ?>
                <p style="margin-top: 15px; font-size: 14px; color: #666;">Silakan tunjukkan QR Code ini kepada panitia saat registrasi. QR Code juga tersedia sebagai file attachment.</p>
            </div>
            
            <p><strong>Catatan Penting:</strong></p>
            <ul>
                <li>Simpan QR Code ini dengan baik</li>
                <li>Tunjukkan QR Code kepada panitia saat registrasi</li>
                <li>QR Code ini adalah bukti bahwa Anda telah terdaftar sebagai peserta</li>
            </ul>
            
            <p>Terima kasih telah bergabung dengan Batam Campus Expo!</p>
        </div>
        <div class="footer">
            <p>Batam Campus Expo - Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\Users\Asus\BCE\Batam-Campus-Expo\BCE\resources\views/emails/ticket-confirmation.blade.php ENDPATH**/ ?>