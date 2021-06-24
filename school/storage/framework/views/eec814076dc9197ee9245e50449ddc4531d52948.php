


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
        <?php echo e($class->links()); ?>

    </div>
    <?php if(Session::has('classAttendSuccess')): ?>
    <div class="alert alert-success ml-4" role="alert">
        <?php echo e(Session::get('classAttendSuccess')); ?>

    </div>
    <?php endif; ?>
    <div class="row mt-3">

        <!-- card start -->
        <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($item->class_name); ?></h5>
                    <hr>
                    <p class="card-text">Fee - <?php echo e($item->fee); ?></p>
                    <p>ClassType : <b><?php echo e($item->class_type); ?></b></p>
                    <p>Time : <?php echo e($item->start_date); ?> - <?php echo e($item->end_date); ?></p>
                    <p>Teacher - <?php echo e($item->name); ?></p>
                    <a href="<?php echo e(route('lookClassInformation',[$item->class_id])); ?>" class="btn btn-success float-right">Look Class Information </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- card end -->

    </div>
</div>


<!-- course form close -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.studentDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/student/class/classList.blade.php ENDPATH**/ ?>