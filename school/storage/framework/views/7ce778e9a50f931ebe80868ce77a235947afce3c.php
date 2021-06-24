


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
    </div>
    <div class="row mt-3">
        <legend class="ml-4"></legend>

        <!-- card start -->
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h5 class="card-title"><label>Class Title - <?php echo e($class[0]->class_name); ?></label></h5>
                    </div>
                    <hr>
                    <p class="card-text">Class Fee -<?php echo e($class[0]['fee']); ?></p>
                    <hr>
                    <p class="card-text">Start Time - <?php echo e($class[0]['start_time']); ?></p>
                    <hr>
                    <p class="card-text">End Time - <?php echo e($class[0]->end_time); ?></p>
                    <hr>
                    <p class="card-text">Start Date - <?php echo e($class[0]['start_date']); ?></p>
                    <hr>
                    <p class="card-text">End Date - <?php echo e($class[0]->end_date); ?></p>
                    <hr>
                    <p class="card-text">Class Type - <?php echo e($class[0]['class_type']); ?></p>
                    <hr>
                    <?php if($status==2): ?>
                    <p style="color:green;">You can joint this class</p>
                    <?php elseif($status==3): ?>
                    <p style="color:red;">Student Full for this class</p>
                    <?php elseif($status==4): ?>
                    <p style="color:red;">Teacher Reject this class</p>
                    <?php elseif($status==0): ?>
                    <a href="<?php echo e(route('enrollClass',[$class[0]->class_id,$class[0]->user_id])); ?>" class="btn btn-success float-right">Enroll </a>
                    <?php else: ?>
                    <p style="color:orange;">Wait Teacher Response</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <!-- card end -->

    </div>
    <button class="btn btn-sm btn-warning mt-2" onclick="goBack()">Back</button>
    <hr>


</div>


<!-- course form close -->

<?php $__env->stopSection(); ?>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php echo $__env->make('layouts.studentDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/student/class/lookClassInformation.blade.php ENDPATH**/ ?>