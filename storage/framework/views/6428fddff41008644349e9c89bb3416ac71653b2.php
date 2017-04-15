<!DOCTYPE html>
<html lang="fr">



<head>
    <title>Accès à l'administration</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/materialadmin.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/font-awesome.min.css" /> <!--Font Awesome Icon Font-->
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/material-design-iconic-font.min.css" /> <!--Material Design Iconic Font-->


    <!-- END STYLESHEETS -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/assets/js/modules/materialadmin/libs/utils/html5shiv.js?1422823601"></script>
    <script type="text/javascript" src="/assets/js/modules/materialadmin/libs/utils/respond.min.js?1422823601"></script>
    <![endif]-->
</head>






<body class="menubar-hoverable header-fixed ">

<!-- BEGIN LOGIN SECTION -->

<!-- END LOGIN SECTION -->
<?php if(Session::has('flash_error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(Session::get('flash_error')); ?>

    </div>
<?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>


<!-- BEGIN JAVASCRIPT -->
<script src="/assets/js/modules/materialadmin/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/bootstrap/bootstrap.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/spin.js/spin.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/autosize/jquery.autosize.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/assets/js/modules/materialadmin/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="/assets/js/modules/materialadmin/core/demo/Demo.js"></script>


<!-- END JAVASCRIPT -->



</body>
</html>