<?php 
global $portfolio_options;
$class = $portfolio_options['sections-work-class'];
$title = $portfolio_options['sections-work-title'];
$content = $portfolio_options['sections-work-content'];
$list = $portfolio_options['sections-work-list'];
$link = $portfolio_options['sections-work-link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_work', $page_details ); 
?>
<section id="section-work" class="<?php if(@$portfolio_options['sections-work-background-type'] == 1) echo @$portfolio_options['sections-work-background'] . ' ';?><?php if(@$portfolio_options['sections-work-color-type'] == 1) echo @$portfolio_options['sections-work-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_work', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($list) : ?>				
					<div class="row portfolio-items">
					<?php foreach($list as $post_id) : ?>
						<?php
				        $class = ''; 
				        $term_list = get_the_terms($post_id, 'work-category');
				        if(@$term_list){
					        foreach($term_list as $term_single) {
					            $class .= $term_single->slug . ' ';
					        }
					    }
				        ?>
						<div class="portfolio-item <?php echo $class ?> col col-md-4 col-lg-3 single-work">


	                        <div class="recent-work-wrap h-100">
	                            <img class="img-responsive" src="<?php echo aq_resize(get_the_post_thumbnail_url($post_id), 290, 179,true) ?>" width="290" height="179" alt="<?php echo get_the_title($post_id) ?>">
	                            <h4 class="project-title text-center"><?php echo get_the_title($post_id) ?></h4>
	                            <div class="overlay">
	                                <div class="recent-work-inner">
	                                    <a class="preview" data-fancybox="gallery-<?php echo $post_id ?>" data-caption="<?php echo get_the_title($post_id) ?>" href="<?php echo get_the_post_thumbnail_url($post_id) ?>"><i class="fa fa-plus"></i></a>
	                                <?php if (get_post_meta( $post_id, '_portfolio_work_website', true )) : ?>
	                                    <a class="preview" href="<?php echo get_post_meta( $post_id, '_portfolio_work_website', true ); ?>" target="_blank"><i class="fa fa-chain"></i></a>
	                                <?php endif; ?>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="hidden">
	                        <?php 
	                        $images = get_post_meta( $post_id, '_portfolio_work_gallery_images', true );
	                        if($images) : ?>
	                        	<?php foreach ($images as $attachment_id => $url) : ?>
	                        	<a data-fancybox="gallery-<?php echo $post_id ?>" data-caption="<?php echo get_the_title($post_id) ?>" href="<?php echo wp_get_attachment_url( $attachment_id ) ?>"></a>
	                        	<?php endforeach; ?>
	                        <?php endif; ?>
	                        </div>

						</div>
					<?php endforeach; ?>
					</div>
					<?php if ($link['text_field_1'] AND $link['text_field_2']) ?>
					<div class="row justify-content-center"><div class="col-lg-4"><a href="<?php echo esc_url(do_shortcode($link['text_field_2'])); ?>" class="btn btn-block btn-portfolio"><?php echo do_shortcode( $link['text_field_1'] ); ?></a></div></div>
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_work', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_work', $page_details  ); ?>