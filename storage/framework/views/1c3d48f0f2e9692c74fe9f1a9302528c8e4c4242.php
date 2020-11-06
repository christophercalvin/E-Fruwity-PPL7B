

<?php $__env->startSection('content'); ?>


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2> Buat Data Produk Baru</h2>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('admin.partials.flash', ['$errors' => $errors], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(!empty($product)): ?>
                        <?php echo Form::model($product, ['url' => ['admin/products', $product->id], 'method' => 'PUT']); ?>

                        <?php echo Form::hidden('id'); ?>

                    <?php else: ?>
                        <?php echo Form::open(['url' => 'admin/products']); ?>

                    <?php endif; ?>
                        <div class="form-group">
                            <?php echo Form::label('NamaProduk', 'Nama Produk'); ?>

                            <?php echo Form::text('NamaProduk', null, ['class' => 'form-control', 'placeholder' => 'Apel Malang']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('StokProduk', 'Stok Produk'); ?>

                            <?php echo Form::number('StokProduk', null, ['class' => 'form-control', 'placeholder' => '12']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('DeskripsiProduk', 'Deskripsi Produk'); ?>

                            <?php echo Form::textarea('DeskripsiProduk', null, ['class' => 'form-control', 'placeholder' => 'Apel Malang panen tgl 5 Nov 2020']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('HargaProduk', 'Harga Produk'); ?>

                            <?php echo Form::number('HargaProduk', null, ['class' => 'form-control', 'placeholder' => '50000']); ?>

                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Tambahkan Produk</button>
                            <a href="<?php echo e(url('admin/products')); ?>" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Fruwity\resources\views/Admin/products/form1.blade.php ENDPATH**/ ?>