<?php $__env->startSection('title', 'Manajemen Akses'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 15px;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 20px 0;
    }
    @media screen and (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        .table-responsive {
            margin: 20px -15px 0;
        }
    }
</style>
<div>
    <h2>Manajemen Akses Admin</h2>
    
    <div style="margin: 30px 0;">
        <h3>Tambah Admin Baru</h3>
        <form action="<?php echo e(route('admin.create-admin')); ?>" method="POST" style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 15px;">
            <?php echo csrf_field(); ?>
            <div class="form-grid">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div>
                    <label>Nama</label>
                    <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div>
                    <label>Role</label>
                    <select name="role" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Admin</button>
        </form>
    </div>

    <h3 style="margin-top: 30px;">Daftar Admin</h3>
    <div class="table-responsive">
    <table style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($admin->username); ?></td>
                <td><?php echo e($admin->name); ?></td>
                <td><?php echo e($admin->email); ?></td>
                <td><?php echo e(ucfirst(str_replace('_', ' ', $admin->role))); ?></td>
                <td>
                    <?php if($admin->is_active): ?>
                        <span style="color: #27ae60; font-weight: bold;">Aktif</span>
                    <?php else: ?>
                        <span style="color: #e74c3c; font-weight: bold;">Nonaktif</span>
                    <?php endif; ?>
                </td>
                <td>
                    <form action="<?php echo e(route('admin.update-permissions', $admin->id)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <label style="display: inline-block; margin-right: 10px;">
                            <input type="checkbox" name="is_active" value="1" <?php echo e($admin->is_active ? 'checked' : ''); ?> onchange="this.form.submit()">
                            Aktif
                        </label>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\BCE\Batam-Campus-Expo\BCE\resources\views/admin/access-management.blade.php ENDPATH**/ ?>