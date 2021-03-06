<?php 
global $portfolio_options;
if (is_home()) $page_id = get_option( 'page_for_posts' );
elseif (is_front_page()) $page_id = get_option('page_on_front');
else $page_id = get_the_ID();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo get_post_meta( get_the_ID(),'_yoast_wpseo_focuskw', true ) ?>">
    <meta name="description" content="<?php echo get_post_meta( get_the_ID(),'_yoast_wpseo_metadesc', true ) ?>">
	<meta name="author" content="Md. Mostak Shahid">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<input id="loader-status" type="hidden" value="<?php echo $portfolio_options['misc-page-loader'] ?>">
<?php if ($portfolio_options['misc-page-loader']) : ?>
    <div class="se-pre-con">
    <?php if ($portfolio_options['misc-page-loader-image']['url']) : ?>
        <img class="img-responsive animation <?php echo $portfolio_options['misc-page-loader-image-animation'] ?>" src="<?php echo do_shortcode( $portfolio_options['misc-page-loader-image']['url'] ); ?>">
    <?php else : ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
    <?php endif; ?>
    </div>
<?php endif; ?>
	<?php 
	$header_class=$portfolio_options['sections-header-class']; 
	$title_class=$portfolio_options['sections-title-class']; 
	$breadcrumbs_class=$portfolio_options['sections-breadcrumbs-class']; 
	?>
	<header id="main-header" class="<?php if(@$portfolio_options['sections-header-background-type'] == 1) echo @$portfolio_options['sections-header-background'] . ' ';?><?php if(@$portfolio_options['sections-header-color-type'] == 1) echo @$portfolio_options['sections-header-color'];?> <?php echo $header_class?>">
		<div class="content-wrap">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark navbar-custom-bg">			
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<img class="img-responsive img-fluid img-logo" src="<?php echo aq_resize($portfolio_options['logo']['url'],44,44,true)?>" width="44" height="44" alt="<?php echo bloginfo( 'name' ); ?> - Logo"> <span class="logo-text">Portfolio</span>
						
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					if (is_front_page()) $menu = 'mainmenu';
					else $menu = 'innermenu';
					wp_nav_menu([
						'menu'            => $menu,
						'theme_location'  => $menu,
						'container'       => 'div',
						'container_id'    => 'collapsibleNavbar',
						'container_class' => 'collapse navbar-collapse',
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav ml-auto',
						'depth'           => 2,
						'fallback_cb'     => 'bs4navwalker::fallback',
						//'walker'          => new bs4navwalker()
						]);
					?>
				</nav>				
			</div>
		</div>
	</header>
	<?php if (get_post_meta($page_id, '_portfolio_banner_enable', true ) OR is_404()) : ?>
		<?php 
		$banner_img = get_post_meta( get_the_ID(), '_portfolio_banner_cover', true ); 
		$banner_mp4 = get_post_meta( get_the_ID(), '_portfolio_banner_mp4', true ); 
		$banner_webm = get_post_meta( get_the_ID(), '_portfolio_banner_webm', true ); 
		$banner_shortcode = get_post_meta( get_the_ID(), '_portfolio_banner_shortcode', true ); 
		?>
		<section id="page-title" class="<?php if(@$portfolio_options['sections-title-background-type'] == 1) echo @$portfolio_options['sections-title-background'] . ' ';?><?php if(@$portfolio_options['sections-title-color-type'] == 1) echo @$portfolio_options['sections-title-color'];?> <?php echo $title_class ?>">
			<?php if ($banner_shortcode) : ?>
				<div class="shortcode-output"><?php echo do_shortcode( $banner_shortcode ); ?></div>
			<?php elseif ($banner_mp4 OR $banner_webm) : ?>
				<div class="video-output">
					<video id="banner-video" autoplay loop muted playsinline <?php if ($banner_img) : ?> style="background-image:url(<?php echo $banner_img ?>)" <?php endif; ?>>
					<?php if($banner_mp4) : ?>
						<source src="<?php echo $banner_mp4 ?>">
					<?php endif; ?>
					<?php if($banner_webm) : ?>
						<source src="<?php echo $banner_webm ?>">
					<?php endif; ?>
					</video>					
				</div>
			<?php endif; ?>
			<div class="content-wrap">
				<div class="container">
					<?php 
					if (is_home()) :
						$page_for_posts = get_option( 'page_for_posts' );
					$title = get_the_title($page_for_posts);
					elseif (is_404()) :
						$title = '404 Page';
					else :
						$title = get_the_title();
					endif; 
					?>
					<span class="heading"><?php echo $title ?></span>
				</div>
			</div>
		</section>
	<?php endif ?>
	<?php if (get_post_meta($page_id, '_portfolio_breadcrumb_enable', true )) : ?>
		<section id="section-breadcrumbs" class="<?php if(@$portfolio_options['sections-breadcrumbs-background-type'] == 1) echo @$portfolio_options['sections-breadcrumbs-background'] . ' ';?><?php if(@$portfolio_options['sections-breadcrumbs-color-type'] == 1) echo @$portfolio_options['sections-breadcrumbs-color'];?> <?php echo $breadcrumbs_class ?>">
			<div class="content-wrap">
				<div class="container">
					<?php mos_breadcrumbs(); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>