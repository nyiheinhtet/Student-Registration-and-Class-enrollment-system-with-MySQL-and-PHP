


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>

<div class="container">
    <?php if(Session::has('deleteSuccess')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('deleteSuccess')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if(Session::has('updateSuccess')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('updateSuccess')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <table class="table table-hover  mt-20">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Title</th>
                <th scope="col">Course Explanation</th>
                <th scope="col">Course Details</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($item['course_id']); ?></th>
                <td><?php echo e($item['course_title']); ?></td>
                <td><?php echo e($item['course_explanation']); ?></td>
                <td><?php echo e($item['course_details']); ?></td>
                <td>
                    <a href="<?php echo e(route('updatePage',$item['course_id'])); ?>"><button class="btn btn-sm btn-secondary">Update</button></a>
                </td>
                <td>
                    <a href="<?php echo e(route('deleteCourse',$item['course_id'])); ?>"><button class="btn btn-sm btn-danger">Delete</button></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/course/courseList.blade.php ENDPATH**/ ?>