


<?php $__env->startSection('content'); ?>
<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>

<div class="container">

    <table class="table table-hover  mt-20">
        <div class="mt-3" style="color:red;"><?php echo e($news->links()); ?></div>
    
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Request Course Title</th>
                <th scope="col">Request Course Details</th>
                <th scope="col">Request Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($item['course_request_id']); ?></th>
                <td><?php echo e($item['name']); ?></td>
                <td><?php echo e($item['course_request_title']); ?></td>
                <td><?php echo e($item['course_request_details']); ?></td>
                <td><?php echo e($item['created_at']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
   
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/news/newsInfo.blade.php ENDPATH**/ ?>