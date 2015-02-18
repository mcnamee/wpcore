<?php
/**
 * The template for displaying the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-inverse navbar-static-top">
	<div class="navbar-header">
		<div class="container">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

            <div class="col-md-6">
            <?php if ( get_theme_mod( 'wpcore_header_logo' ) ) : ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_attr(get_theme_mod( 'wpcore_header_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive">
                </a>
            <?php else : ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
            </div> <!-- /.col -->

            <?php if ( get_theme_mod( 'wpcore_header_byline' ) ) : ?>
            <div class="col-md-6 text-right">
                <?php echo esc_attr(get_theme_mod( 'wpcore_header_byline' )); ?>
            </div> <!-- /.col -->
            <?php endif; ?>
		</div><!-- .container -->
	</div><!-- .navbar-header -->

	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<div id="navbar" class="navbar-collapse collapse">
			<div class="container">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav navbar-nav',
						'theme_location' => 'primary',
						'walker' => new wp_bootstrap_navwalker()
					) );
				?>
			</div><!-- .container -->
		</div><!-- #navbar -->
	<?php endif; ?>
</nav>

<div id="page" class="hfeed site">