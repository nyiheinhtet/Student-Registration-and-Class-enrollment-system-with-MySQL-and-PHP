


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
        <?php echo e($course->links()); ?>

    </div>
    <div class="row mt-3">

        <!-- card start -->
        <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($item->course_title); ?></h5>
                    <p class="card-text"><?php echo e($item->course_explanation); ?></p>
                    <p>Teacher - <b><?php echo e($item->name); ?></b></p>
                    <a href="<?php echo e(route('lookCourse',$item->course_id)); ?>" class="btn btn-success float-right">Look Info </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- card end -->

    </div>
</div>


<!-- course form close -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.studentDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/student/course/list.blade.php ENDPATH**/ ?>