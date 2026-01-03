<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }
    .stat-card {
        background: #3498db;
        color: white;
        padding: 20px;
        border-radius: 8px;
    }
    .stat-card h3 {
        font-size: 14px;
        margin-bottom: 10px;
    }
    .stat-card .number {
        font-size: 32px;
        margin-top: 10px;
    }
    .scanner-section {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        margin: 30px 0;
    }
    .scanner-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .scanner-container {
        position: relative;
        background: #000;
        border-radius: 8px;
        overflow: hidden;
        width: 100%;
    }
    .scanner-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 3px solid #27ae60;
        width: 250px;
        height: 250px;
        pointer-events: none;
    }
    .scan-result {
        background: white;
        padding: 20px;
        border-radius: 8px;
        min-height: 300px;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    @media screen and (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
            margin: 20px 0;
        }
        .stat-card {
            padding: 15px;
        }
        .stat-card .number {
            font-size: 28px;
        }
        .scanner-section {
            padding: 15px;
            margin: 20px 0;
        }
        .scanner-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .scanner-overlay {
            width: 200px;
            height: 200px;
        }
        .scan-result {
            min-height: 200px;
            padding: 15px;
        }
        .table-responsive {
            margin: 0 -15px;
        }
    }
    
    @media screen and (max-width: 360px) {
        .stats-grid {
            gap: 10px;
        }
        .stat-card {
            padding: 12px;
        }
        .stat-card h3 {
            font-size: 12px;
        }
        .stat-card .number {
            font-size: 24px;
        }
        .scanner-section {
            padding: 10px;
        }
        .scanner-overlay {
            width: 150px;
            height: 150px;
        }
        .scan-result {
            min-height: 150px;
            padding: 10px;
        }
    }
</style>

<div>
    <h2>Dashboard Admin</h2>
    
    <div class="stats-grid">
        <div class="stat-card" style="background: #3498db;">
            <h3>Total Tiket</h3>
            <p class="number"><?php echo e($totalTickets); ?></p>
        </div>
        <div class="stat-card" style="background: #f39c12;">
            <h3>Tiket Pending</h3>
            <p class="number"><?php echo e($pendingCount); ?></p>
        </div>
        <div class="stat-card" style="background: #27ae60;">
            <h3>Tiket Terkonfirmasi</h3>
            <p class="number"><?php echo e($confirmedCount); ?></p>
        </div>
        <div class="stat-card" style="background: #9b59b6;">
            <h3>Total User</h3>
            <p class="number"><?php echo e($totalUsers); ?></p>
        </div>
    </div>

    <!-- QR Code Scanner Section -->
    <div class="scanner-section">
        <h3 style="margin-bottom: 20px; font-size: 18px;">Scan QR Code Tiket</h3>
        <div style="background: #e3f2fd; border-left: 4px solid #2196f3; padding: 12px; margin-bottom: 20px; border-radius: 4px; font-size: 13px;">
            <strong>💡 Petunjuk:</strong> Klik "Mulai Scan" untuk mengaktifkan kamera. Pastikan izin kamera sudah diberikan pada browser Anda. Untuk hasil terbaik, gunakan kamera belakang.
        </div>
        <div class="scanner-grid">
            <div>
                <div id="scanner-container" class="scanner-container">
                    <video id="video" width="100%" style="display: block;"></video>
                    <canvas id="canvas" style="display: none;"></canvas>
                    <div id="scanner-overlay" class="scanner-overlay"></div>
                </div>
                <div style="margin-top: 15px; text-align: center;">
                    <button id="start-scanner" class="btn btn-primary" style="margin-right: 10px; width: 100%; margin-bottom: 10px;">Mulai Scan</button>
                    <button id="stop-scanner" class="btn btn-danger" style="display: none; width: 100%;">Stop Scan</button>
                </div>
            </div>
            <div>
                <div id="scan-result" class="scan-result">
                    <p style="color: #666; text-align: center; margin-top: 50px; font-size: 14px;">Hasil scan akan muncul di sini</p>
                </div>
            </div>
        </div>
    </div>

    <h3 style="margin-top: 30px; margin-bottom: 20px; font-size: 18px;">Tiket Pending</h3>
    <?php if($pendingTickets->count() > 0): ?>
        <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Kode Tiket</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Tanggal Pembelian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pendingTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ticket->ticket_code); ?></td>
                    <td><?php echo e($ticket->user->name); ?></td>
                    <td><?php echo e($ticket->user->email); ?></td>
                    <td><?php echo e($ticket->created_at->format('d/m/Y H:i')); ?></td>
                    <td>
                        <form action="<?php echo e(route('admin.confirm-ticket', $ticket->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p>Tidak ada tiket pending.</p>
    <?php endif; ?>

    <h3 style="margin-top: 30px; margin-bottom: 20px; font-size: 18px;">Tiket Terkonfirmasi Terbaru</h3>
    <?php if($confirmedTickets->count() > 0): ?>
        <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Kode Tiket</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Tanggal Konfirmasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $confirmedTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ticket->ticket_code); ?></td>
                    <td><?php echo e($ticket->user->name); ?></td>
                    <td><?php echo e($ticket->user->email); ?></td>
                    <td><?php echo e($ticket->confirmed_at ? $ticket->confirmed_at->format('d/m/Y H:i') : '-'); ?></td>
                    <td><span style="color: #27ae60; font-weight: bold;">Terkonfirmasi</span></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p>Belum ada tiket yang dikonfirmasi.</p>
    <?php endif; ?>

    <h3 style="margin-top: 30px; margin-bottom: 20px; font-size: 18px;">Daftar User (Total: <?php echo e($totalUsers); ?>)</h3>
    <?php if($users->count() > 0): ?>
        <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jumlah Tiket</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->tickets_count); ?></td>
                    <td><?php echo e($user->created_at->format('d/m/Y H:i')); ?></td>
                    <td>
                        <?php if($user->tickets_count == 0): ?>
                            <form action="<?php echo e(route('admin.delete-user', $user->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user <?php echo e($user->name); ?>?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;">Hapus</button>
                            </form>
                        <?php else: ?>
                            <span style="color: #999; font-size: 12px;">Ada <?php echo e($user->tickets_count); ?> tiket</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p>Tidak ada user.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
<script>
    let videoStream = null;
    let scanning = false;
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const startBtn = document.getElementById('start-scanner');
    const stopBtn = document.getElementById('stop-scanner');
    const resultDiv = document.getElementById('scan-result');

    startBtn.addEventListener('click', startScanner);
    stopBtn.addEventListener('click', stopScanner);

    // Check camera availability on page load
    window.addEventListener('load', async () => {
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            resultDiv.innerHTML = `
                <div style="background: #fff3cd; border: 1px solid #ffc107; color: #856404; padding: 15px; border-radius: 8px; font-size: 14px;">
                    <h4 style="margin-top: 0; color: #856404; font-size: 16px; margin-bottom: 10px;">⚠ Kamera Tidak Tersedia</h4>
                    <p>Browser Anda tidak mendukung akses kamera. Gunakan browser modern seperti Chrome, Firefox, atau Safari.</p>
                </div>
            `;
        }
    });

    async function startScanner() {
        // Show configuration alert
        const confirmMessage = 'Untuk menggunakan scanner QR code, aplikasi memerlukan akses ke kamera perangkat Anda.\n\n' +
            'Instruksi:\n' +
            '1. Klik "Izinkan" pada popup izin kamera\n' +
            '2. Pastikan kamera tidak digunakan aplikasi lain\n' +
            '3. Untuk hasil terbaik, gunakan kamera belakang\n\n' +
            'Apakah Anda ingin melanjutkan?';
        
        if (!confirm(confirmMessage)) {
            return;
        }

        try {
            // Check if camera is available
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                alert('Browser Anda tidak mendukung akses kamera. Gunakan browser modern seperti Chrome, Firefox, atau Safari.');
                return;
            }

            // Try to get available cameras
            let devices = [];
            try {
                devices = await navigator.mediaDevices.enumerateDevices();
                const videoDevices = devices.filter(device => device.kind === 'videoinput');
                
                if (videoDevices.length === 0) {
                    alert('Tidak ada kamera yang terdeteksi di perangkat Anda.');
                    return;
                }
            } catch (e) {
                console.log('Cannot enumerate devices:', e);
            }

            // Request camera access
            const constraints = {
                video: {
                    facingMode: 'environment', // Prefer back camera
                    width: { ideal: 1280 },
                    height: { ideal: 720 }
                }
            };

            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            videoStream = stream;
            video.srcObject = stream;
            video.play();
            
            startBtn.style.display = 'none';
            stopBtn.style.display = 'inline-block';
            scanning = true;
            
            // Show success message
            resultDiv.innerHTML = `
                <div style="background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; padding: 15px; border-radius: 8px; font-size: 14px;">
                    <h4 style="margin-top: 0; color: #0c5460; font-size: 16px; margin-bottom: 10px;">📷 Kamera Aktif</h4>
                    <p>Arahkan kamera ke QR code tiket untuk memindai.</p>
                </div>
            `;
            
            scanQRCode();
        } catch (err) {
            console.error('Error accessing camera:', err);
            
            let errorMessage = 'Tidak dapat mengakses kamera.\n\n';
            
            if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                errorMessage += 'Izin kamera ditolak.\n\n';
                errorMessage += 'Cara mengaktifkan:\n';
                errorMessage += '1. Klik ikon gembok/kamera di address bar\n';
                errorMessage += '2. Pilih "Izinkan" untuk akses kamera\n';
                errorMessage += '3. Refresh halaman dan coba lagi';
            } else if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                errorMessage += 'Tidak ada kamera yang ditemukan di perangkat Anda.';
            } else if (err.name === 'NotReadableError' || err.name === 'TrackStartError') {
                errorMessage += 'Kamera sedang digunakan aplikasi lain.\n\n';
                errorMessage += 'Tutup aplikasi lain yang menggunakan kamera dan coba lagi.';
            } else if (err.name === 'OverconstrainedError' || err.name === 'ConstraintNotSatisfiedError') {
                errorMessage += 'Kamera tidak mendukung pengaturan yang diminta.\n\n';
                errorMessage += 'Mencoba dengan pengaturan default...';
                // Retry with simpler constraints
                try {
                    const simpleStream = await navigator.mediaDevices.getUserMedia({ video: true });
                    videoStream = simpleStream;
                    video.srcObject = simpleStream;
                    video.play();
                    startBtn.style.display = 'none';
                    stopBtn.style.display = 'inline-block';
                    scanning = true;
                    scanQRCode();
                    return;
                } catch (retryErr) {
                    errorMessage += '\n\nGagal: ' + retryErr.message;
                }
            } else {
                errorMessage += 'Error: ' + err.message;
            }
            
            alert(errorMessage);
            
            resultDiv.innerHTML = `
                <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; font-size: 14px;">
                    <h4 style="margin-top: 0; color: #e74c3c; font-size: 16px; margin-bottom: 10px;">✗ Gagal Mengakses Kamera</h4>
                    <p style="margin: 5px 0;">${errorMessage.replace(/\n/g, '<br>')}</p>
                </div>
            `;
        }
    }

    function stopScanner() {
        if (videoStream) {
            videoStream.getTracks().forEach(track => track.stop());
            videoStream = null;
        }
        video.srcObject = null;
        scanning = false;
        startBtn.style.display = 'inline-block';
        stopBtn.style.display = 'none';
        resultDiv.innerHTML = '<p style="color: #666; text-align: center; margin-top: 100px;">Hasil scan akan muncul di sini</p>';
    }

    function scanQRCode() {
        if (!scanning) return;

        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            canvas.height = video.videoHeight;
            canvas.width = video.videoWidth;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);

            if (code) {
                handleQRCodeResult(code.data);
                return;
            }
        }

        requestAnimationFrame(scanQRCode);
    }

    async function handleQRCodeResult(qrData) {
        try {
            // Try to parse as JSON first
            let qrJson = qrData;
            try {
                qrJson = JSON.parse(qrData);
            } catch (e) {
                // If not JSON, try to find ticket code in the string
                const ticketMatch = qrData.match(/"ticket_code"\s*:\s*"([^"]+)"/);
                if (ticketMatch) {
                    qrJson = { ticket_code: ticketMatch[1] };
                } else {
                    throw new Error('Format QR Code tidak valid');
                }
            }

            // Send to server for verification
            const response = await fetch('<?php echo e(route("admin.verify-ticket")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ qr_data: JSON.stringify(qrJson) })
            });

            const data = await response.json();

            if (data.success) {
                resultDiv.innerHTML = `
                    <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; font-size: 14px;">
                        <h4 style="margin-top: 0; color: #27ae60; font-size: 16px; margin-bottom: 10px;">✓ Tiket Valid</h4>
                        <p style="margin: 5px 0; word-break: break-word;"><strong>Kode:</strong> ${data.ticket.code}</p>
                        <p style="margin: 5px 0; word-break: break-word;"><strong>Nama:</strong> ${data.ticket.user}</p>
                        <p style="margin: 5px 0; word-break: break-all;"><strong>Email:</strong> ${data.ticket.email}</p>
                        <p style="margin: 5px 0;"><strong>Status:</strong> <span style="color: #27ae60; font-weight: bold;">${data.ticket.status}</span></p>
                        <p style="margin: 5px 0;"><strong>Dikonfirmasi:</strong> ${data.ticket.confirmed_at}</p>
                    </div>
                `;
            } else {
                resultDiv.innerHTML = `
                    <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; font-size: 14px;">
                        <h4 style="margin-top: 0; color: #e74c3c; font-size: 16px; margin-bottom: 10px;">✗ ${data.message}</h4>
                        ${data.ticket ? `
                            <p style="margin: 5px 0; word-break: break-word;"><strong>Kode:</strong> ${data.ticket.code}</p>
                            <p style="margin: 5px 0; word-break: break-word;"><strong>Nama:</strong> ${data.ticket.user}</p>
                            <p style="margin: 5px 0; word-break: break-all;"><strong>Email:</strong> ${data.ticket.email}</p>
                            <p style="margin: 5px 0;"><strong>Status:</strong> ${data.ticket.status}</p>
                        ` : ''}
                    </div>
                `;
            }
        } catch (error) {
            resultDiv.innerHTML = `
                <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; font-size: 14px;">
                    <h4 style="margin-top: 0; color: #e74c3c; font-size: 16px;">Error</h4>
                    <p style="word-break: break-word;">${error.message}</p>
                </div>
            `;
        }
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\BCE\Batam-Campus-Expo\BCE\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>