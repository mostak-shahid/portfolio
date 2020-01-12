<?php 
global $portfolio_options;
$class = $portfolio_options['sections-counter-class'];
$title = $portfolio_options['sections-counter-title'];
$content = $portfolio_options['sections-counter-content'];
$slides = $portfolio_options['sections-counter-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_counter', $page_details ); 
?>
<section id="section-counter" class="<?php if(@$portfolio_options['sections-counter-background-type'] == 1) echo @$portfolio_options['sections-counter-background'] . ' ';?><?php if(@$portfolio_options['sections-counter-color-type'] == 1) echo @$portfolio_options['sections-counter-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_counter', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (@$slides) : ?>				
					<div class="row">
					<?php foreach ($slides as $slide) : ?>				
                        <div class="col-md-3 col-sm-6">
                        	<div class="con-wrapper text-center"> 
                        	<?php if ($slide['link_url']) : ?>                       		
	                        	<div class="icon-con"><i class="<?php echo $slide['link_url'] ?>"></i></div>
	                        <?php endif; ?>
	                        <?php if ($slide['link_title']) : ?> 
	                        	<div class="counter-con"><div class="counter"><?php echo do_shortcode( $slide['link_title'] ); ?></div></div>
	                        <?php endif; ?>
	                        <?php if ($slide['title']) : ?> 
	                        	<h4 class="text-con"><?php echo do_shortcode( $slide['title'] ); ?></h4>
	                        <?php endif; ?>
                        	</div>
                        </div>
					<?php endforeach; ?>
                    </div>
				<?php endif; ?>

		<?php do_action( 'action_after_counter', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_counter', $page_details  ); ?>