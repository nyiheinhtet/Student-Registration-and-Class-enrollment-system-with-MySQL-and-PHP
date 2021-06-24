


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>

<h1>Add Admin</h1>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/admin/addAdmin/create.blade.php ENDPATH**/ ?>