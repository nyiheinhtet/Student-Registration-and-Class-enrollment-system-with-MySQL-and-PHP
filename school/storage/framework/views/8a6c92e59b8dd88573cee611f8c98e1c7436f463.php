<h1>Student Dashboard</h1>
<?php if(Session::has('authError')): ?>
    <p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>

<form action="<?php echo e(route('logout')); ?>" method="post">
    <?php echo csrf_field(); ?>

    <input type="submit" value="logout">

</form><?php /**PATH C:\xampp\htdocs\school\resources\views/student/dashboard.blade.php ENDPATH**/ ?>