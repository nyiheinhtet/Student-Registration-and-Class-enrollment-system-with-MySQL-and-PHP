


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>

<h1>Notification</h1>
<div class="container mt-4">
    <form method="post" action="">
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Send Notification To All</legend>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="course_request_details" rows="3"></textarea>
        </div>
        <?php if($errors->has('course_request_details')): ?>
        <p style="color:red"><?php echo e($errors->first('course_request_details')); ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary mt-3">Request</button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/admin/notification/notification.blade.php ENDPATH**/ ?>