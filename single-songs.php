<?php get_header(); ?>
		
		<div class="song-header">
			<div class="container">
				<div class="row" style="top: 0px; visibility: visible;">
					<div class="col span_6">
						<div class="inner-wrap">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php $terms = get_the_terms( $post->ID , 'performer' ); 
							    foreach ( $terms as $term ) {
							        $term_link = get_term_link( $term, 'performer' );
							        if( is_wp_error( $term_link ) )
							        continue;
							    echo '<a href="' . $term_link . '"><strong>' . $term->name . '</strong></a>';
							    } 
							?> • <strong>Key</strong> (<?php $terms = get_the_terms( $post->ID , 'key' ); 
							    foreach ( $terms as $term ) {
							        $term_link = get_term_link( $term, 'key' );
							        if( is_wp_error( $term_link ) )
							        continue;
							    echo '<a href="' . $term_link . '"><strong>' . $term->name . '</strong></a>' . ', ';
							    } 
							    $output = ob_get_clean(); echo rtrim($output, ', ');
							?>)
							<br/>
							<strong>Tempo:</strong> <?php $terms = get_the_terms( $post->ID , 'tempo' ); 
							    foreach ( $terms as $term ) {
							        $term_link = get_term_link( $term, 'tempo' );
							        if( is_wp_error( $term_link ) )
							        continue;
							    echo '<a href="' . $term_link . '">' . $term->name . '</a>' . ', ';
							    } 
							    $output = ob_get_clean(); echo rtrim($output, ', ');
							?> • 
<strong>Theme:</strong> <?php $terms = get_the_terms( $post->ID , 'themes' ); 
							    foreach ( $terms as $term ) {
							        $term_link = get_term_link( $term, 'themes' );
							        if( is_wp_error( $term_link ) )
							        continue;
							    echo '<a href="' . $term_link . '">' . $term->name . '</a>' . ', ';
							    } 
							    $output = ob_get_clean(); echo rtrim($output, ', ');
							?>
							
						</div>
					</div>
				</div>
			</div>
		</div><!-- song-header -->




<div class="container-wrap fullscreen-blog-header std-blog-fullwidth no-sidebar';">

	<div class="container main-content">
		<div class="col span_8">

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
				<?php the_content(); ?>
			
			<?php endwhile; ?><?php endif; ?>
			
		</div>
		<div class="col span_4 song-side-bar">
			<h3>Practice Central</h3>
			<br/>
		<p>
		<?php if( get_field('lead_sheet') ): ?>
	<strong>Lead Sheat:</strong> <a href="<?php the_field('lead_sheet'); ?>">Click Here</a><br/>
<?php endif; ?>
<?php if( get_field('chord_sheet') ): ?>
	<strong>Chord Sheat:</strong> <a href="<?php the_field('chord_sheet'); ?>">Click Here</a>
<?php endif; ?><br/>
<strong>Listen:</strong> <?php if( get_field('youtube_link') ): ?>
	<a href="<?php the_field('youtube_link'); ?>" target="_blank"><i class="fa fa-youtube-play fa-lg" aria-hidden="true"></i> Youtube</a> 
<?php endif; ?> <?php if( get_field('spotify_link') ): ?>
	<a href="<?php the_field('spotify_link'); ?>" target="_blank"><i class="fa fa-spotify fa-lg" aria-hidden="true"></i> Spotify</a><br/>
<?php endif; ?>
</p>

		</div>

			   

	</div><!--/container-->

</div><!--/container-wrap-->

<?php get_footer(); ?>
