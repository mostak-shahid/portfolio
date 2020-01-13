<?php 
global $portfolio_options;
$class = $portfolio_options['sections-contact-class'];
$title = $portfolio_options['sections-contact-title'];
$content = $portfolio_options['sections-contact-content'];
$shortcode = $portfolio_options['sections-contact-shortcode'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_contact', $page_details ); 
?>
<section id="section-contact" class="<?php if(@$portfolio_options['sections-contact-background-type'] == 1) echo @$portfolio_options['sections-contact-background'] . ' ';?><?php if(@$portfolio_options['sections-contact-color-type'] == 1) echo @$portfolio_options['sections-contact-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_contact', $page_details ); ?>
			<div class="row">
				<div class="col-lg-4">
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($shortcode) : ?>				
					<div class="form-wrapper"><?php echo do_shortcode( $shortcode ); ?></div>
				<?php endif; ?>

				</div>
				<div class="col-lg-8">
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
					<h4>FEEL FREE TO CONTACT WITH ME!</h4>
					<p><?php echo do_shortcode( '[phone index=1]' ); ?></p>
					<p><?php echo do_shortcode( '[email index=1]' ); ?></p>
				<?php endif; ?>
					
				</div>
			</div>
		<?php do_action( 'action_after_contact', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_contact', $page_details  ); ?>