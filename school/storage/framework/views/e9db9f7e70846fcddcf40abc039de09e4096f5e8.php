


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->

<div class="container mt-2">
    <?php if(Session::has('createClassSuccess')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('createClassSuccess')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('createClass')); ?>">
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Create Class</legend>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Course Name</label>
            <select class="form-control" name="course_id">
                <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item['course_id']); ?>"><?php echo e($item['course_title']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Class Name" name="class_name" value="<?php echo e(old('class_name')); ?>">
            <?php if($errors->class_check->has('class_name')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('class_name')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Class Fees</label>
            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter Class Fees" name="class_fee" value="<?php echo e(old('class_fee')); ?>">
            <?php if($errors->class_check->has('class_fee')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('class_fee')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Start Time</label>
            <input type="time" class="form-control" aria-describedby="emailHelp" placeholder="Enter Start Time" name="start_time" value="<?php echo e(old('start_time')); ?>">
            <?php if($errors->class_check->has('start_time')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('start_time')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>End Time</label>
            <input type="time" class="form-control" aria-describedby="emailHelp" placeholder="Enter End Time" name="end_time" value="<?php echo e(old('end_time')); ?>">
            <?php if($errors->class_check->has('end_time')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('end_time')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Enter Start Date" name="start_date" value="<?php echo e(old('start_date')); ?>">
            <?php if($errors->class_check->has('start_date')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('start_date')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Enter End Date" name="end_date" value="<?php echo e(old('end_date')); ?>">
            <?php if($errors->class_check->has('end_date')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('end_date')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Class Type</label>
            <select class="form-control" name="class_type" value="<?php echo e(old('class_type')); ?>">
                <?php if(old('class_type')=='weekday'): ?>
                <option value="weekday" selected>Weekday Class</option>
                <option value="weekend">Weekend Class</option>
                <?php else: ?>
                <option value="weekday">Weekday Class</option>
                <option value="weekend" selected>Weekend Class</option>
                <?php endif; ?>

            </select>
            <?php if($errors->class_check->has('class_type')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('class_type')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-check form-check-inline">

            <?php if(old('monday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="monday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="monday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Monday</label>

            <?php if(old('tuesday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="tuesday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="tuesday" value="1">
            <?php endif; ?>

            <label class="form-check-label mr-4" for="inlineRadio1">Tuesday</label>

            <?php if(old('wednesday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="wednesday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="wednesday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Wednesday</label>

            <?php if(old('thursday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="thursday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="thursday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Thursday</label>

            <?php if(old('friday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="friday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="friday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Friday</label>

            <?php if(old('saturday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="saturday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="saturday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Saturday</label>

            <?php if(old('sunday')!=null): ?>
            <input class="form-check-input" type="checkbox" name="sunday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="sunday" value="1">
            <?php endif; ?>

            <label class="form-check-label mr-4" for="inlineRadio1">Sunday</label>
        </div><br><br>
        <button type="submit" class="btn btn-primary">Create Class</button>
    </form>
    <br><br><br><br><br>
</div>

<!-- course form close -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/class/classInfo.blade.php ENDPATH**/ ?>