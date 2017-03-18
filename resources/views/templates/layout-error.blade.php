<html lang="fr">
<head>
    <title>@yield('title')</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/materialadmin.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/font-awesome.min.css" /> <!--Font Awesome Icon Font-->
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/material-design-iconic-font.min.css" /> <!--Material Design Iconic Font-->
    <!-- Additional CSS includes -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/assets/js/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="/assets/js/libs/utils/respond.min.js"></script>
    <![endif]-->
</head>

<body class="menubar-hoverable header-fixed ">
<!-- BEGIN HEADER-->
<header id="header" >



    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">

        @if(Session::has('flash_message'))
            <div class="alert alert-success" role="alert">
                {!! Session::get('flash_message') !!}
            </div>
        @endif
        <div class="section-body contain-lg">

            @yield('content')

        </div>

    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">


    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->


<!-- BEGIN JAVASCRIPT -->
<!-- BEGIN EXPERIENCE TEMPLATES -->
<script type="text/html" id="experienceTmpl">
    <li class="clearfix">
        <div class="page-header no-border holder">
            <a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
            <h4 class="text-accent">Experience <%=index%></h4>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="experience-company-<%=index%>" name="experience-company-<%=index%>">
                    <label for="experience-company-<%=index%>">Company</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="experience-functiontitle-<%=index%>" name="experience-functiontitle-<%=index%>">
                    <label for="experience-functiontitle-<%=index%>">Function</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="input-daterange input-group" id="demo-date-range">
                        <div class="input-group-content">
                            <input type="text" class="form-control" name="start<%=index%>" />
                            <label>Date range</label>
                        </div>
                        <span class="input-group-addon">to</span>
                        <div class="input-group-content">
                            <input type="text" class="form-control" name="end<%=index%>" />
                            <div class="form-control-line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="experience-description-<%=index%>" id="experience-description-<%=index%>" class="form-control" rows="3"></textarea>
            <label for="experience-description-<%=index%>">Job description</label>
        </div>
    </li>
</script>
<!-- END EXPERIENCE TEMPLATES -->

<!-- BEGIN SKILLS TEMPLATES -->
<script type="text/html" id="skillTmpl">
    <li class="clearfix">
        <div class="row">
            <div class="col-xs-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="skill-<%=index%>" name="skill-<%=index%>">
                    <label for="skill-<%=index%>">Skill <%=index%></label>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <select name="skill-rating-<%=index%>" class="form-control">
                        <option value=""></option>
                        <option value="100">100</option>
                        <option value="90">90</option>
                        <option value="80">80</option>
                        <option value="70">70</option>
                        <option value="60">60</option>
                        <option value="50">50</option>
                        <option value="40">40</option>
                        <option value="30">30</option>
                        <option value="20">20</option>
                        <option value="10">10</option>
                    </select>
                    <label for="skill-rating-<%=index%>">Rating</label>
                </div>
            </div>
        </div>
    </li>
</script>
<!-- END SKILLS TEMPLATES -->


<script src="/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="/assets/js/libs/spin.js/spin.min.js"></script>
<script src="/assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/assets/js/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="/assets/js/core/demo/Demo.js"></script>


<!-- END JAVASCRIPT -->

</body></html>