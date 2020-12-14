

<?php $__env->startSection('content'); ?>
<div class='content'>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class= "card-header card-header-border-botton">
                        <h1>Payment Activity</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>Aktivitas</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(($data->number)); ?> dengan metode pembayaran <?php echo e(($data->method)); ?> sebanyak Rp <?php echo e(($data->amount)); ?> [STATUS: <?php echo e(($data->status)); ?>] </td>
                                        <td>
                                        <a href="<?php echo e(url('admin/orders/'. $data->id)); ?>" class="btn btn-warning btn-sm">Lihat Rincian</a>
                                            
                                            <?php echo Form::open(['url' => 'admin/orders/'. $data->id, 'class' => 'delete', 'style' => 'display:inline-block']); ?>

                                            <?php echo Form::hidden('_method', 'DELETE'); ?>

                                            <!--<?php echo Form::submit('HAPUS', ['class' => 'btn btn-danger btn-sm']); ?>-->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Fruwity\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>