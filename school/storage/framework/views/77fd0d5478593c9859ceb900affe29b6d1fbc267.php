


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
    </div>
    <div class="row mt-3">
        <legend class="ml-4">Teacher - <?php echo e($courseData[0]->name); ?></legend>

        <!-- card start -->
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h5 class="card-title"><label>Course Title - </label><?php echo e($courseData[0]->course_title); ?></h5>
                    </div>
                    <hr>
                    <p class="card-text"><?php echo e($courseData[0]->course_explanation); ?></p>
                    <hr>
                    <p class="card-text"><?php echo e($courseData[0]->course_details); ?></p>
                    <hr>
                    <!-- <div class="alert alert-success" role="alert">
                        <label></label>
                    </div> -->

                    <!-- <a href="<?php echo e(route('lookCourse',$courseData[0]->course_id)); ?>" class="btn btn-success float-right">Look Info </a> -->
                </div>
            </div>
        </div>
        <!-- card end -->

    </div>
    <button class="btn btn-sm btn-warning mt-2" onclick="goBack()">Back</button>
    <hr>
    <!-- related class -->
    <legend class="ml-4">Related Class</legend>
    <hr>
    <?php if(Session::has('classAttendSuccess')): ?>
    <div class="alert alert-success ml-4" role="alert">
        <?php echo e(Session::get('classAttendSuccess')); ?>

    </div>
    <?php endif; ?>
    <div class="row mt-3">
        <!-- card start -->
        <?php if($relatedClass!=null): ?>
        <?php $__currentLoopData = $relatedClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($item->class_name); ?></h5>
                    <hr>
                    <p class="card-text"><?php echo e($item->fee); ?></p>
                    <p>ClassType : <b><?php echo e($item->class_type); ?></b></p>
                    <p>Time : <?php echo e($item->start_date); ?> - <?php echo e($item->end_date); ?></p>
                    <a href="<?php echo e(route('lookClassInformation',[$item->class_id])); ?>" class="btn btn-success float-right">Look Class Information </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <div class="alert alert-danger ml-4" role="alert">
            There is no related class for this Course..
        </div>
        <?php endif; ?>

        <!-- card end -->

    </div>

    <div style="height: 50vh;"></div>
</div>


<!-- course form close -->

<?php $__env->stopSection(); ?>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php echo $__env->make('layouts.studentDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/student/course/lookCourse.blade.php ENDPATH**/ ?>