

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <?php echo $__env->make('admin.products.product_menus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Product Images</h2>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Tanggal Upload</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>    
                                    <td><?php echo e($image->id); ?></td>
                                    <td><img src="<?php echo e(asset('storage/'.$image->path)); ?>" style="width:150px"/></td>
                                    <td><?php echo e($image->created_at); ?></td>
                                    <td>
                                        <?php echo Form::open(['url' => 'admin/products/images/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']); ?>

                                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                                        <?php echo Form::submit('remove', ['class' => 'btn btn-danger btn-sm']); ?>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4"><center>Kamu Belum Memiliki Foto Produk! Ayo Upload Foto Produkmu Sekarang!</center></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="<?php echo e(url('admin/products/'.$productID.'/add-image')); ?>" class="btn btn-primary">Tambah Foto</a>
                </div>
            </div>  
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Fruwity\resources\views/admin/products/images.blade.php ENDPATH**/ ?>