<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>OOOOOOOOOOPS!</strong>
        <br>
        Maaf Terjadi Kesalahan Dengan Inputan Anda! Silahkan Cek Apakah Data Sudah Sesuai atau Ada Kolom yang Belum Terisi.<br/><br/>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div> 
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('YESS!!! Berhasil Mengubah Data')); ?></div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('OH TIDAK! Terjadi Kesalahan, Silahkan Coba Lagi')); ?></div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\E-Fruwity\resources\views/admin/partials/flash.blade.php ENDPATH**/ ?>