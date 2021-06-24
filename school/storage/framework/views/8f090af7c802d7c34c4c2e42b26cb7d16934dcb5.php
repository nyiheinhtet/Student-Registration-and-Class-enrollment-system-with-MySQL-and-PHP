


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
    <?php if(Session::has('changeStatusSuccess')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('changeStatusSuccess')); ?>

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
                <th scope="col">Student Name</th>
                <th scope="col">Course Name</th>
                <th scope="col">Student Attend Class Name</th>
                <th scope="col">Request Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $classStudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($item['class_student_id']); ?></th>
                <td><?php echo e($item['name']); ?></td>
                <td><?php echo e($item['course_title']); ?></td>
                <td><?php echo e($item['class_name']); ?></td>
                <td><?php echo e($item['created_at']); ?></td>
                <td>
                    <?php if($item['status']==1 || $item['status']==5): ?>
                    <a href="<?php echo e(route('changeStatus',[$item['class_student_id'],2])); ?>"><button class="btn btn-sm btn-success">Accept</button></a>
                    <a href="<?php echo e(route('changeStatus',[$item['class_student_id'],3])); ?>"><button class="btn btn-sm btn-warning">Student Full</button></a>
                    <a href="<?php echo e(route('changeStatus',[$item['class_student_id'],4])); ?>"><button class="btn btn-sm btn-danger">Reject</button></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('changeStatus',[$item['class_student_id'],5])); ?>"><button class="btn btn-sm btn-secondary">Edit</button></a>
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/classStudent/classStudentInfo.blade.php ENDPATH**/ ?>