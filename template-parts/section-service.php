<?php 
global $portfolio_options;
$class = $portfolio_options['sections-service-class'];
$title = $portfolio_options['sections-service-title'];
$content = $portfolio_options['sections-service-content'];
$slides = $portfolio_options['sections-service-slides'];
$layout = $portfolio_options['sections-service-layout'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_service', $page_details ); 
?>
<section id="section-service" class="<?php if(@$portfolio_options['sections-service-background-type'] == 1) echo @$portfolio_options['sections-service-background'] . ' ';?><?php if(@$portfolio_options['sections-service-color-type'] == 1) echo @$portfolio_options['sections-service-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_service', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (@$slides) : ?>
					<div class="row services">
					<?php foreach($slides as $slide) : ?>
						<div class="<?php echo $layout ?> mb30">
							<div class="service-unit position-relative text-center">
							<?php if ($slide['attachment_id']) : ?>
								<div class="img-part"><img class="img-fluid img-service" src="<?php  ?>" alt="<?php echo strip_tags(do_shortcode( $slide['title'] )); ?>"></div>
							<?php endif; ?>
								<div class="content">
								<?php if ($slide['title']) : ?>
									<h3 class="service-section-title"><?php echo do_shortcode( $slide['title'] ) ?></h3>
								<?php endif; ?>
								<?php if ($slide['description']) : ?>
									<div class="service-section-desc"><?php echo do_shortcode( $slide['description'] ) ?></div>
								<?php endif; ?>
								<?php if ($slide['link_title']) : ?>
									<div class="service-section-link-title"><?php echo do_shortcode( $slide['link_title'] ) ?></div>
								<?php endif; ?>
								<?php if ($slide['link_url']) : ?>
									<a class="hidden-link" href="<?php echo do_shortcode( $slide['link_url'] ) ?>">Read More</a>
								<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>				
				<?php endif; ?>
		<?php do_action( 'action_after_service', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_service', $page_details  ); ?>