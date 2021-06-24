


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->

<div class="container mt-5">
    <form method="post" action="<?php echo e(route('updateClass',$class[0]['class_id'])); ?>">
        <?php if(Session::has('updateSuccess')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(Session::get('updateSuccess')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <legend class="mb-3">Update Class</legend>
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" class="form-control" name="class_name" aria-describedby="emailHelp" value="<?php echo e(old('class_name',$class[0]['class_name'])); ?>">
            <?php if($errors->class_check->has('class_name')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('class_name')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Class Fee</label>
            <input type="text" class="form-control" name="class_fee" aria-describedby="emailHelp" value="<?php echo e(old('class_fee',$class[0]['fee'])); ?>">
            <?php if($errors->class_check->has('class_fee')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('class_fee')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Start Time</label>
            <input type="time" class="form-control" name="start_time" aria-describedby="emailHelp" value="<?php echo e(old('start_time',$class[0]['start_time'])); ?>">
            <?php if($errors->class_check->has('start_time')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('start_time')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>End Time</label>
            <input type="time" class="form-control" name="end_time" aria-describedby="emailHelp" value="<?php echo e(old('end_time',$class[0]['end_time'])); ?>">
            <?php if($errors->class_check->has('end_time')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('end_time')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" name="start_date" aria-describedby="emailHelp" value="<?php echo e(old('start_date',$class[0]['start_date'])); ?>">
            <?php if($errors->class_check->has('start_date')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('start_date')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" name="end_date" aria-describedby="emailHelp" value="<?php echo e(old('end_date',$class[0]['end_date'])); ?>">
            <?php if($errors->class_check->has('end_date')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('end_date')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Class Type</label>
            <select class="form-control" name="class_type">
                <?php if($class[0]['class_type']=='weekday' || old('class_type')=='weekday'): ?>
                <option value="weekday" selected>Weekday Class</option>
                <option value="weekend">Weekend Class</option>
                <?php elseif($class[0]['class_type']=='weekend' || old('class_type')=='weekend'): ?>
                <option value="weekday">Weekday Class</option>
                <option value="weekend" selected>Weekend Class</option>
                <?php endif; ?>
            </select>
            <?php if($errors->class_check->has('class_type')): ?>
            <p style="color:red;back-ground:black;"><?php echo e($errors->class_check->first('class_type')); ?></p>
            <?php endif; ?>
        </div>
        <div class="form-check form-check-inline">
            <?php if( old('monday')=='1' || $class[0]['monday']=='1'): ?>
            <input class="form-check-input" type="checkbox" name="monday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="monday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Monday</label>

            <?php if($class[0]['tuesday']=='1' || old('tuesday')=='1'): ?>
            <input class="form-check-input" type="checkbox" name="tuesday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="tuesday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Tuesday</label>

            <?php if($class[0]['wednesday']=='1' || old('wednesday')=='1'): ?>
            <input class="form-check-input" type="checkbox" name="wednesday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="wednesday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Wednesday</label>

            <?php if($class[0]['thursday']=='1' || old('thursday')=='1'): ?>
            <input class="form-check-input" type="checkbox" name="thursday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="thursday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Thursday</label>

            <?php if($class[0]['friday']=='1' || old('friday')=='1'): ?>
            <input class="form-check-input" type="checkbox" name="friday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="friday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Friday</label>

            <?php if($class[0]['saturday']=='1' || old('saturday')=='1'): ?>
            <input class="form-check-input" type="checkbox" name="saturday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="saturday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Saturday</label>

            <?php if($class[0]['sunday']=='1' || old('sunday')=='1'): ?>
            <input class="form-check-input" type="checkbox" name="sunday" value="1" checked>
            <?php else: ?>
            <input class="form-check-input" type="checkbox" name="sunday" value="1">
            <?php endif; ?>
            <label class="form-check-label mr-4" for="inlineRadio1">Sunday</label>
        </div><br><br>
        <button type="submit" class="btn btn-primary">Update Class</button>
    </form>
</div>

<!-- course form close -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/class/updateClass.blade.php ENDPATH**/ ?>