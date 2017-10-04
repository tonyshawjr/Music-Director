<?php get_header(); ?>
		
		<div class="song-header">
			<div class="container">
				<div class="row" style="top: 0px; visibility: visible;">
					<div class="col span_6">
						<div class="inner-wrap">
							<h1 class="entry-title">Music Director</h1>
							Worship Leader Master Song List
							<br/>
							
						</div>
					</div>
				</div>
			</div>
		</div><!-- song-header -->




<div class="container-wrap fullscreen-blog-header std-blog-fullwidth no-sidebar';">

	<div class="container main-content">
		<div class="row">
		<div class="col span_12">

			<?php 
				query_posts('post_type=songs&post_status=publish&orderby=title&order=ASC');
				if(have_posts()) : while(have_posts()) : the_post(); ?>

			<div class="col song-card">
				<div class="song-card-top">
				<h4><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></h4>
				</div>
				<div class="song-card-middle">
					<div class="song-details">
						<div class="move-left">
							<small><strong>Key:</strong> <?php $terms = get_the_terms( $post->ID , 'key' ); 
						    foreach ( $terms as $term ) {
						        $term_link = get_term_link( $term, 'key' );
						        if( is_wp_error( $term_link ) )
						        continue;
						    echo '<a href="' . $term_link . '">' . $term->name . '</a>' . ', ';
						    } 
						    $output = ob_get_clean(); echo rtrim($output, ', ');?></small> 
						</div>
						<div class="move-right">
							<small><strong>Tempo:</strong> <?php $terms = get_the_terms( $post->ID , 'tempo' ); 
						    foreach ( $terms as $term ) {
						        $term_link = get_term_link( $term, 'tempo' );
						        if( is_wp_error( $term_link ) )
						        continue;
						    echo '<a href="' . $term_link . '">' . $term->name . '</a>' . ', ';
						    } 
						    $output = ob_get_clean(); echo rtrim($output, ', '); ?></small>
						</div>
						<div class="move-clear"></div>
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
