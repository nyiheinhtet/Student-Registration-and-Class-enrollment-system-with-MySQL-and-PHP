


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
    </div>
    <div class="row mt-3">

        <!-- card start -->
        <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name - <?php echo e($item->name); ?></h5>
                    <p class="card-text">Phone - <?php echo e($item->phone_number_one); ?></p>
                    <p>Region - <b><?php echo e($item->region); ?></b></p>
                    <a href="<?php echo e(route('teacherRelatedCourse',$item->id)); ?>" class="btn btn-success float-right">Look Info </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- card end -->

    </div>
</div>


<!-- course form close -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.studentDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/student/teacher/teacherList.blade.php ENDPATH**/ ?>