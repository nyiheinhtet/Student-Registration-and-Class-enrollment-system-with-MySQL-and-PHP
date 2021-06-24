


<?php $__env->startSection('content'); ?>
<h1>Profile</h1>
<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>
<!-- teacher form -->
<!-- course form open -->

<div class="container mt-5">
    <?php if(Session::has('updateSuccess')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('updateSuccess')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('updateProfile',$teacherInfo[0]['id'])); ?>">
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Edit Profile</legend>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Course Title" value="<?php echo e(old('name',$teacherInfo[0]['name'])); ?>">
            <?php if($errors->has('name')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('name')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Course Title" value="<?php echo e(old('email',$teacherInfo[0]['email'])); ?>">
            <?php if($errors->has('email')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('email')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" aria-describedby="emailHelp" placeholder="Enter " value="<?php echo e(old('date_of_birth',$teacherInfo[0]['date_of_birth'])); ?>">
            <?php if($errors->has('date_of_birth')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('date_of_birth')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <?php if($teacherInfo[0]['gender']=='male'): ?>
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <?php else: ?>
                <option value="male">Male</option>
                <option value="female" selected>Female</option>
                <?php endif; ?>
            </select>
            <?php if($errors->has('gender')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('gender')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Primary Phone Number</label>
            <input type="number" class="form-control" name="phone_number_one" aria-describedby="emailHelp" placeholder="Enter " value="<?php echo e(old('phone_number_one',$teacherInfo[0]['phone_number_one'])); ?>">
            <?php if($errors->has('phone_number_one')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('phone_number_one')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Secondary Phone Number</label>
            <input type="number" class="form-control" name="phone_number_two" aria-describedby="emailHelp" placeholder="Enter " value="<?php echo e(old('phone_number_two',$teacherInfo[0]['phone_number_two'])); ?>">
            <?php if($errors->has('phone_number_two')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('phone_number_two')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Region</label>
            <input type="text" class="form-control" name="region" aria-describedby="emailHelp" placeholder="Enter " value="<?php echo e(old('region',$teacherInfo[0]['region'])); ?>">
            <?php if($errors->has('region')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('region')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Town</label>
            <input type="text" class="form-control" name="town" aria-describedby="emailHelp" placeholder="Enter " value="<?php echo e(old('town',$teacherInfo[0]['town'])); ?>">
            <?php if($errors->has('town')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('town')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter " value="<?php echo e(old('address',$teacherInfo[0]['address'])); ?>">
            <?php if($errors->has('address')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->first('address')); ?></p>
            <?php endif; ?>
        </div>
        <a href="<?php echo e(route('changePassword')); ?>">Change Password</a><br>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>

<!-- course form close -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/profile/profileInfo.blade.php ENDPATH**/ ?>