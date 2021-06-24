


<?php $__env->startSection('content'); ?>
<h1>Profile</h1>
<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>
<!-- teacher form -->
<!-- course form open -->

<div class="container mt-5">
    <?php echo $__env->make('teacher.profile.changePasswordError', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form method="post" action="<?php echo e(route('changePassword')); ?>">
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Change Password</legend>
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" class="form-control" name="old_password" aria-describedby="emailHelp" placeholder="Enter Old Password" value="<?php echo e(old('old_password')); ?>">
            <?php if($errors->has('old_password')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('old_password')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="new_password" aria-describedby="emailHelp" placeholder="Enter New Password" value="<?php echo e(old('new_password')); ?>">
            <?php if($errors->has('new_password')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('new_password')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" aria-describedby="emailHelp" placeholder="Enter Confirm Password" value="<?php echo e(old('confirm_password')); ?>">
            <?php if($errors->has('confirm_password')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('confirm_password')); ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Change Password</button>
    </form>
</div>

<!-- course form close -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/profile/changePassword.blade.php ENDPATH**/ ?>