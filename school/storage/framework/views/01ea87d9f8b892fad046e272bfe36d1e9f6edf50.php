


<?php $__env->startSection('content'); ?>
<h1>Notification</h1>
<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/notification/notificationInfo.blade.php ENDPATH**/ ?>