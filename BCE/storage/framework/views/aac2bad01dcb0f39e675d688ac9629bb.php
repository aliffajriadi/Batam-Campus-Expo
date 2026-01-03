<?php $__env->startSection('title', 'Manajemen Tiket'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 20px 0;
    }
    @media screen and (max-width: 768px) {
        .table-responsive {
            margin: 20px -15px 0;
        }
    }
</style>
<div>
    <h2>Manajemen Tiket</h2>
    
    <div class="table-responsive">
    <table style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Kode Tiket</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Status</th>
                <th>Tanggal Pembelian</th>
                <th>Tanggal Konfirmasi</th>
                <th>Dikonfirmasi Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($ticket->ticket_code); ?></td>
                <td><?php echo e($ticket->user->name); ?></td>
                <td><?php echo e($ticket->user->email); ?></td>
                <td>
                    <?php if($ticket->status === 'confirmed'): ?>
                        <span style="color: #27ae60; font-weight: bold;">Terkonfirmasi</span>
                    <?php elseif($ticket->status === 'pending'): ?>
                        <span style="color: #f39c12; font-weight: bold;">Pending</span>
                    <?php else: ?>
                        <span style="color: #e74c3c; font-weight: bold;">Dibatalkan</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($ticket->created_at->format('d/m/Y H:i')); ?></td>
                <td><?php echo e($ticket->confirmed_at ? $ticket->confirmed_at->format('d/m/Y H:i') : '-'); ?></td>
                <td><?php echo e($ticket->confirmedBy ? $ticket->confirmedBy->name : '-'); ?></td>
                <td>
                    <?php if($ticket->status === 'pending'): ?>
                        <form action="<?php echo e(route('admin.confirm-ticket', $ticket->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
    
    <div style="margin-top: 20px; text-align: center;">
        <?php echo e($tickets->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\BCE\Batam-Campus-Expo\BCE\resources\views/admin/tickets.blade.php ENDPATH**/ ?>