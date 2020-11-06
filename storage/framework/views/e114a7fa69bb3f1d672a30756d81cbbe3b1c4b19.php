

<?php $__env->startSection('content'); ?>
    <div class='content'>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class= "card-header card-header-border-botton">
                        <h1>Data Produk</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Stok</th>
                                <th>Deskripsi Produk</th>
                                <th>Harga Produk</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $data_produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($product->id); ?></td>
                                        <td><?php echo e($product->NamaProduk); ?></td>
                                        <td><?php echo e($product->StokProduk); ?></td>
                                        <td><?php echo e($product->DeskripsiProduk); ?></td>
                                        <td><?php echo e($product->HargaProduk); ?></td>
                                        <td>
                                        <a href="<?php echo e(url('admin/products/'. $product->id .'/edit')); ?>" class="btn btn-warning btn-sm">Ubah Data</a>
                                            
                                            <?php echo Form::open(['url' => 'admin/products/'. $product->id, 'class' => 'delete', 'style' => 'display:inline-block']); ?>

                                            <?php echo Form::hidden('_method', 'DELETE'); ?>

                                            <?php echo Form::submit('HAPUS', ['class' => 'btn btn-danger btn-sm']); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7"><center>Yahhh, Tidak Ada Data :( </center></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($data_produks->links()); ?>

                    </div>
                    <div class="card-footer text right">
                        <a href="<?php echo e(url('admin/products/create')); ?>" class="btn btn-primary">Tambah Barang Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Fruwity\resources\views/admin/products/index.blade.php ENDPATH**/ ?>