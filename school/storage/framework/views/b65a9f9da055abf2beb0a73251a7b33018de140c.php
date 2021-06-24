<?php if(Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if(Session::has('notSameBoth')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('notSameBoth')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if(Session::has('errorLength')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('errorLength')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if(Session::has('notMatch')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(Session::get('notMatch')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?><?php /**PATH C:\xampp\htdocs\school\resources\views/teacher/profile/changePasswordError.blade.php ENDPATH**/ ?>