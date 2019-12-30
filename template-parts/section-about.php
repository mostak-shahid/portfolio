<?php 
global $portfolio_options;
$class = $portfolio_options['sections-about-class'];
$title = $portfolio_options['sections-about-title'];
$content = $portfolio_options['sections-about-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_about', $page_details ); 
?>
<section id="section-about" class="<?php if(@$portfolio_options['sections-about-background-type'] == 1) echo @$portfolio_options['sections-about-background'] . ' ';?><?php if(@$portfolio_options['sections-about-color-type'] == 1) echo @$portfolio_options['sections-about-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_about', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
		<?php do_action( 'action_after_about', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>