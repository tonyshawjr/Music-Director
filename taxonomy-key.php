<?php get_header(); ?>
		
		<div class="song-header">
			<div class="container">
				<div class="row" style="top: 0px; visibility: visible;">
					<div class="col span_6">
						<div class="inner-wrap">
							<h1 class="entry-title"><span style="color: #EBDCB2">Song Finder:</span> <?php $theterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				if($theterm) {
					echo $theterm->name;
				} else {
					wp_title("",true);
				} ?></h1>
							
						</div>
					</div>
				</div>
			</div>
		</div><!-- song-header -->




<div class="container-wrap fullscreen-blog-header std-blog-fullwidth no-sidebar';">

	<div class="container main-content">
		<div class="row">
			<div class="col span_12">
				<?php $args = array(
					'post_type' => 'songs',
					'tax_query' => array(
						array(
							'taxonomy' => 'key',
							'field'    => 'slug',
							'terms'    => 'slug',
						),
					'orderby' => 'title',
                    'order' => 'ASC',
					),
				);
				$query = new WP_Query( $args );
				?>
				
				<?php print_r( $args ) ?>
					
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
				<div class="col song-card">
					<div class="song-card-top">
					<h4><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></h4>
					</div>
					<div class="song-card-middle">
						<div class="song-details">
							
						</div>
					</div>
					<div class="song-card-bottom">
						<small><p><strong>Excerpt:</strong> <?php the_field('highlighted_lyrics'); ?></p></small>
					</div>
				</div>
					
				<?php endwhile; ?><?php endif; ?>
			<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
			   

	</div><!--/container-->

</div><!--/container-wrap-->

<?php get_footer(); ?>
