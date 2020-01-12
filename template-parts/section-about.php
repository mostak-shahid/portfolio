<?php 
global $portfolio_options;
$class = $portfolio_options['sections-about-class'];
$title = $portfolio_options['sections-about-title'];
$content = $portfolio_options['sections-about-content'];
$slides = $portfolio_options['sections-about-slides'];
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
				<div class="row">
					<div class="col-lg-8">
						<?php if ($content) : ?><div class="content-wrapper wow fadeInLeft"><?php echo do_shortcode( $content ) ?></div><?php endif; ?>						
					</div>
					<div class="col-lg-4">
						<?php if (@$slides) : ?>
							<h4>MY SKILS</h4>
							<?php foreach($slides as $slide) : ?>
								<div class="skill-unit">
									<strong><?php echo do_shortcode( $slide['title'] ); ?></strong>
									<div class="progress progress-xs wow fadeInRight">
										<div class="progress-bar bg-black" role="progressbar" aria-valuenow="<?php echo $slide['link_title'] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $slide['link_title'] ?>%"> <span class="sr-only"><?php echo $slide['link_title'] ?>% Complete</span></div>
									</div>
								</div>
							<?php endforeach;?>
						<?php endif?>
					</div>
				</div>
		<?php do_action( 'action_after_about', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>