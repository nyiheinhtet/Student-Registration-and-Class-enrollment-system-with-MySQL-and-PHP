<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        /* .navbar-custom > div > ul > li > a { */

        .navbar-custom>div>span>form>button {
            color: whitesmoke;
            font-size: 20px;
            font-weight: bold;
            font-family: candara;
            background-color: black;
        }

        .navbar-custom>div>span>form>button:hover {
            color: gold;
            font-size: 20px;
            font-weight: bold;
            font-family: candara;
            background-color: black;
        }

        .navbar-custom a {
            color: whitesmoke;
            font-size: 20px;
            font-weight: bold;
            font-family: candara;

        }

        .navbar-custom a:hover {
            color: gold;
            font-size: 20px;
            font-weight: bold;
            font-family: candara;

        }

        .navbar-custom>a {
            color: whitesmoke;
            font-size: 30px;
            font-weight: bold;
            font-family: candara;
        }

        .navbar-custom>a:hover {
            color: gold;
            font-size: 30px;
            font-weight: bold;
            font-family: candara;
        }

        .navbar-custom {
            /* color: white; */
            background-color: #42A5F5;
        }

        .pagination>a{
            background-color: black;
            /* your color ; //background color of buttons. Blue by default */
            border-color: red;
            /* your color; // color or borders. Also blue by default */
            color: green;
            /* your color; // text color of buttons which is white by default */
            cursor: pointer;
            z-index: 2;
        }

        .pagination>.active>span,
        .pagination>.active>a:hover,
        .pagination>.active>span:hover,
        .pagination>.active>a:focus,
        .pagination>.active>span:focus {
            background-color: yellow;
            /* your color ; //background color of buttons. Blue by default */
            border-color: red;
            /* your color; // color or borders. Also blue by default */
            color: green;
            /* your color; // text color of buttons which is white by default */
            cursor: pointer;
            z-index: 2;
        }
    </style>
</head>

<body>


    <!-- <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Admin Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Course <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Class <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Class Student Info <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">News <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Notification <span class="sr-only">(current)</span></a>
                </li>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav> -->

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-success"> -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="<?php echo e(route('teacherCourse')); ?>">Teacher Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('teacherCourse')); ?>">Course <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('courseList')); ?>">Course List<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('teacherClass')); ?>">Class <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(url('teacher/classList')); ?>">Class List<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('teacherClassStudent')); ?>"><i class="fas fa-bars"></i>Class Student Info <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('teacherProfile')); ?>">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('teacherNews')); ?>">RequestCourseList <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('teacherNotification')); ?>">Notification <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="navbar-text">
                <form class="form-inline" action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button class="btn my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </span>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\school\resources\views/layouts/teacherDesign.blade.php ENDPATH**/ ?>