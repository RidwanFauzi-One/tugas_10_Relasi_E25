<!DOCTYPE html>
<html>
<head>
    <title>Detail Masyarakat</title>
</head>
<body>

<h1>Detail Masyarakat</h1>

<p><strong>Nama:</strong> <?php echo e($masyarakat->nama); ?></p>
<p><strong>No KK:</strong> <?php echo e($masyarakat->nomor_kk); ?></p>
<p><strong>No KTP:</strong> <?php echo e($masyarakat->nomor_ktp); ?></p>
<p><strong>Alamat:</strong> <?php echo e($masyarakat->alamat); ?></p>
<p><strong>Jenis Kelamin:</strong> <?php echo e($masyarakat->jenis_kelamin); ?></p>

<hr>

<h2>Daftar Keluhan</h2>

<?php if($masyarakat->keluhans->count()): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Keluhan</th>
            <th>Status</th>
        </tr>

        <?php $__currentLoopData = $masyarakat->keluhans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keluhan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($keluhan->id); ?></td>
                <td><?php echo e($keluhan->keluhan); ?></td>
                <td><?php echo e($keluhan->status); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>
<?php else: ?>
    <p>Belum ada keluhan.</p>
<?php endif; ?>

<br>

<a href="<?php echo e(route('Masyarakat.index')); ?>">
    Kembali ke Daftar Masyarakat
</a>

</body>
</html><?php /**PATH C:\xampp\project-web-laravel1\resources\views/masyarakat/show.blade.php ENDPATH**/ ?>