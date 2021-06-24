


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->

<div class="container mt-5">
    <?php if(Session::has('courseSuccess')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('courseSuccess')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('courseUpdate',$courseData[0]->course_id)); ?>">
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Update Course</legend>
        <div class="form-group">
            <label>Course Title</label>
            <input type="text" class="form-control" name="course_title" aria-describedby="emailHelp" value="<?php echo e($courseData[0]->course_title); ?>">
            <?php if($errors->has('course_title')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('course_title')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Course Explanation</label>
            <textarea class="form-control" name="course_explanation" id="exampleFormControlTextarea1" rows="3"><?php echo e($courseData[0]->course_explanation); ?></textarea>
            <?php if($errors->has('course_explanation')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('course_explanation')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Course Details</label>
            <textarea class="form-control" name="course_details" id="exampleFormControlTextarea1" rows="3" ><?php echo e($courseData[0]->course_details); ?></textarea>
            <?php if($errors->has('course_details')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('course_details')); ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
</div>

<!-- course form close -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/course/updateCourse.blade.php ENDPATH**/ ?>