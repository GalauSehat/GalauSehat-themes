<!DOCTYPE html>
<html class="demo-mobile-horizontal" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="fb:app_id" content="724791887652354" />
	<title><?php wp_title( ' - ', true, 'right' ); ?></title>
	<link type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,700,700italic,500italic,500,300italic,300" rel="stylesheet">
	<link type="text/css" href="<?php bloginfo('template_directory'); ?>/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="<?php bloginfo('template_directory'); ?>/icons/material/css/material-design-iconic-font.min.css" rel="stylesheet">
	<link type="text/css" href="<?php bloginfo('template_directory'); ?>/css/theme.css" rel="stylesheet">
	<link type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ladda-themeless.min.css">

	<?php wp_head(); ?>
</head>

<body><?php include('analyticstracking.php'); ?>
<nav class="toolbar-menu navbar text-center">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle toggle-menu collapsed hidden-lg hidden-sm" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<nav class="nav navbar-nav navbar-desktop">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_id'=>'bs-example-navbar-collapse-1' ) ); ?>
				<?php /* ?>
				<li><a href="<?php bloginfo( 'url' ); ?>/category/Life">Life Hacks</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/category/review/Travel">Travel</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/category/review/Shopping">Shopping</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/category/General">General</a></li>
				<li><a href="<?php bloginfo( 'url' ); ?>/category/Event">Event</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lagi <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php $cats = get_categories(); ?>
						<?php foreach ($cats as $key => $value) :
							if ($value->name != 'Review' && $value->name != 'Travel' && $value->name != 'Shopping' && $value->name != 'General' && $value->name != 'Event') :
								$urlCat = $value->name;
								if (preg_match('/\s/',$value->name)) :
									$urlCat = preg_replace('/\s/', '.', $urlCat);
								endif;
								echo '<li><a href="'.get_site_url().'/category/'.$urlCat.'">'.ucfirst($value->name).'</a></li>';
							endif;
							
						endforeach;
						?>
					</ul>
				</li> */ ?>
			</nav>

			<ul class="nav navbar-nav navbar-mobile">
				<li class="finder">
					<form class="row-table" method="get" action="<?php bloginfo( 'url' ); ?>?">
						<div class="col-cell">
							<input name="s" type="text" class="form-control" placeholder="Cari Artikel">
						</div>
						<div class="col-cell cell-tight">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>">
						<i class="zmdi zmdi-home"></i>
						Home
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/Life">
						<i class="zmdi zmdi-favorite"></i>
						Life Hacks
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/Travel">
						<i class="zmdi zmdi-compass"></i>
						Travel
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/Shopping">
						<i class="zmdi zmdi-balance"></i>
						Shopping
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/General">
						<i class="zmdi zmdi-brightness-4"></i>
						General
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/Event">
						<i class="zmdi zmdi-globe"></i>
						Event
					</a>
				</li>
				<li>
					<a href="">
						<i class="zmdi zmdi-comments"></i>
						Hubungi
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/Food-and-Place">
						<i class="zmdi zmdi-search"></i>
						Food and Place
					</a>
				</li>
				<li>
					<a href="<?php bloginfo( 'url' ); ?>/category/Futsal">
						<i class="zmdi zmdi-face"></i>
						Futsal
					</a>
				</li>
				<li class="connect">
					<a href="<?php bloginfo( 'url' ); ?>/tentang">Tentang Kami</a>
					<a href="<?php bloginfo( 'url' ); ?>/Hubungi">Hubungi</a>
				</li>
			</ul>

			<form id="nav-search-form" class="navbar-form navbar-search" style="display:none;" role="search" method="get" action="<?php bloginfo( 'url' ); ?>?">
				<div style="font-weight:normal;" class="form-group">
					<input type="text" name="s" class="form-control" placeholder="Cari galausehat">
				</div>
			</form>
			<div class="btn-search-wrap hidden-sm hidden-xs">
				<button type="submit" class="btn btn-default btn-search"><i class="fa fa-search"></i></button>
			</div>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>