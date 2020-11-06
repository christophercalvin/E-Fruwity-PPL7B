

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <?php echo $__env->make('admin.products.product_menus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Unggah Foto Produk Disini</h2>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('admin.partials.flash', ['$errors' => $errors], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo Form::open(['url' => ['admin/products/images', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group">
                        <?php echo Form::label('image', 'Product Image'); ?>

                        <?php echo Form::file('image', ['class' => 'form-control-file', 'placeholder' => 'product image']); ?>

                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                        <a href="<?php echo e(url('admin/products/'.$productID.'/images')); ?>" class="btn btn-secondary btn-default">Kembali</a>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>  
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Fruwity\resources\views/admin/products/image_form.blade.php ENDPATH**/ ?>