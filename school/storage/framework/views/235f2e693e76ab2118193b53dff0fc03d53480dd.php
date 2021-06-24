


<?php $__env->startSection('content'); ?>

<?php if(Session::has('authError')): ?>
<p style="color:red"><?php echo e(Session::get('authError')); ?></p>
<?php endif; ?>

<h1>Teacher</h1>
<div class="container mt-4">
    <button class="btn btn-sm btn-success mb-4">Download CSV</button>
<table class="table table-hover  mt-20">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Student Count</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($item['id']); ?></th>
            <td><?php echo e($item['name']); ?></td>
            <td><?php echo e($item['email']); ?></td>
            <td><?php echo e($item['gender']); ?></td>
            <td><?php echo e($item['phone_number_one']); ?></td>
            <td></td>
            <td>
                <a href=""><button class="btn btn-sm btn-secondary">More Detail</button></a>
            <!-- </td>
            <td> -->
                <a href=""><button class="btn btn-sm btn-danger">Delete</button></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/admin/teacher/list.blade.php ENDPATH**/ ?>