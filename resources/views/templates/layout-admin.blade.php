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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/font-awesome.min.css" /> <!--Font Awesome Icon Font-->
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-2/material-design-iconic-font.min.css" /> <!--Material Design Iconic Font-->
    <link type="text/css" rel="stylesheet" href="/customize.css" /> <!--Material Design Iconic Font-->
    <!-- Additional CSS includes -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/assets/js/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="/assets/js/libs/utils/respond.min.js"></script>
    <![endif]-->

    <script src="/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>

</head>

<body class="menubar-hoverable header-fixed ">
<!-- BEGIN HEADER-->
<header id="header" >



    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="/administration">
                            <span class="text-lg text-bold text-primary">Administration</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
					<span class="profile-info">
						{{ Session::get('user_firstname') }} {{ Session::get('user_lastname') }}
 						<small>Administrateur</small>
					</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Configuration</li>
                        <li><a href="{{ action('AdminController@myProfile') }}">Mon profil</a></li>
                        <li><a href="{{ action('AdminController@myNotes') }}">@if(Session::get('user_notes_count') != 0)<span class="badge style-danger pull-right">{{ Session::get('user_notes_count') }}</span> @endif Mes notes</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ action('AdminController@logoutUser') }}"><i class="fa fa-fw fa-power-off text-danger"></i> Déconnexion</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
            <ul class="header-nav header-nav-toggle">
                <li>
                    <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul><!--end .header-nav-toggle -->
        </div><!--end #header-navbar-collapse -->
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

        @if(Session::has('flash_error'))
            <div class="alert alert-danger" role="alert">
                {!! Session::get('flash_error') !!}
            </div>
        @endif

        <section>
        <div class="section-body contain-lg">
            <!--<div class="col-lg-12">
                <h2 class="text-primary" style="margin: 0px;">@yield('title')</h2>
            </div>-->

            @if(isset($errors) && count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @yield('content')

        </div>
            </section>

    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="">
                    <span class="text-lg text-bold text-primary ">ADMIN</span>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">
            <!-- BEGIN MAIN MENU -->

            <ul id="main-menu" class="gui-controls">
                <!-- BEGIN DASHBOARD -->
                <li class="gui-folder">
                    <a class="" href="#home">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>
                    <li class="gui-folder">
                        <a class="" href="#calls">
                            <div class="gui-icon"><i class="glyphicon glyphicon-earphone"></i></div>
                            <span class="title">Appels</span>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ action('AdminCallsController@calls') }}"><span class="title">Tous les appels</span></a>
                                <a href="{{ action('AdminCallsController@myCalls') }}"><span class="title">Mes appels</span></a>
                            </li>
                        </ul>
                    </li>

                 <li class="gui-folder">
                        <a class="" href="#settings">
                            <div class="gui-icon"><i class="glyphicon glyphicon-wrench"></i></div>
                            <span class="title">Réglages</span>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ action('AdminToolsController@users') }}"><span class="title">Utilisateurs</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="gui-folder">
                        <a class="" href="#settings">
                            <div class="gui-icon"><i class="glyphicon glyphicon-user"></i></div>
                            <span class="title">Clients</span>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ action('AdminClientsController@clients') }}"><span class="title">Suivi des clients</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="gui-folder">
                        <a class="" href="#settings">
                            <div class="gui-icon"><i class="glyphicon glyphicon-qrcode"></i></div>
                            <span class="title">Produits</span>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ action('AdminProductsController@products') }}"><span class="title">Gérer les produits</span></a>
                            </li>
                        </ul>
                    </li>
                <!-- END DASHBOARD -->
            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <!--<div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
                </small>
            </div>-->
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">

        <!-- BEGIN OFFCANVAS SEARCH -->
        <!--
        <div id="offcanvas-search" class="offcanvas-pane width-8">
            <div class="offcanvas-head">
                <header class="text-primary">Search</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>

            <div class="offcanvas-body no-padding">
                <ul class="list ">
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>A</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar4.jpg?1422538625" alt="" />
                            </div>
                            <div class="tile-text">
                                Alex Nelson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar9.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Ann Laurens
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>J</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar2.jpg?1422538624" alt="" />
                            </div>
                            <div class="tile-text">
                                Jessica Cruise
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar8.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Jim Peters
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>M</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar5.jpg?1422538625" alt="" />
                            </div>
                            <div class="tile-text">
                                Mabel Logan
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar11.jpg?1422538623" alt="" />
                            </div>
                            <div class="tile-text">
                                Mary Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar3.jpg?1422538624" alt="" />
                            </div>
                            <div class="tile-text">
                                Mike Alba
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>N</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar6.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Nathan Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>P</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar7.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Philip Ericsson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>S</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="http:/assets/img/modules/materialadmin/avatar10.jpg?1422538623" alt="" />
                            </div>
                            <div class="tile-text">
                                Samuel Parsons
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                </ul>
            </div
        </div>
        -->
        <!--end .offcanvas-pane -->
        <!-- END OFFCANVAS SEARCH -->





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


<script src="/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/common.js"></script>
<script src="/assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="/assets/js/libs/spin.js/spin.min.js"></script>
<script src="/assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/assets/js/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="/assets/js/core/demo/Demo.js"></script>


	<!-- END JAVASCRIPT -->

	</body></html>