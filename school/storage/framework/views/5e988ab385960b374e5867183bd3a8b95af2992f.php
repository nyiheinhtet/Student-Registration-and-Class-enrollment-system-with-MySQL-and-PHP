


<?php $__env->startSection('content'); ?>
<h1>Profile</h1>
<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>
<!-- teacher form -->
<!-- course form open -->

<div class="container mt-5">
    <?php if(Session::has('createSuccess')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('createSuccess')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('requestCourse')); ?>">
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Course Request</legend>
        <div class="form-group">
            <label>Request Course Title</label>
            <input type="text" class="form-control" name="course_request_title" aria-describedby="emailHelp" placeholder="Enter Course Title" value="">
            <?php if($errors->has('course_request_title')): ?>
            <p style="color:red"><?php echo e($errors->first('course_request_title')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Request Course Detail</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="course_request_details" rows="3"></textarea>
        </div>
        <?php if($errors->has('course_request_details')): ?>
        <p style="color:red"><?php echo e($errors->first('course_request_details')); ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary mt-3">Request</button>
    </form>
</div>

<!-- course form close -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.studentDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/student/courseRequest/courseRequest.blade.php ENDPATH**/ ?>