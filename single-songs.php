<?php get_header(); ?>
		
		<div class="song-header">
			<div class="container">
				<div class="row" style="top: 0px; visibility: visible;">
					<div class="col span_6">
						<div class="inner-wrap">
							<h1 class="entry-title"><?php the_title(); ?></h1>
														<?php
								$performer_output = '<strong>' . esc_html__( 'N/A', 'music-director' ) . '</strong>';
								$performer_terms  = get_the_terms( get_the_ID(), 'performer' );

								if ( ! empty( $performer_terms ) && ! is_wp_error( $performer_terms ) ) {
									$performer_names = wp_list_pluck( $performer_terms, 'name', 'term_id' );
									$performer_links = array();

									foreach ( $performer_terms as $performer_term ) {
										$performer_name = isset( $performer_names[ $performer_term->term_id ] ) ? $performer_names[ $performer_term->term_id ] : $performer_term->name;
										$performer_link = get_term_link( $performer_term, 'performer' );

										if ( ! is_wp_error( $performer_link ) ) {
											$performer_links[] = '<a href="' . esc_url( $performer_link ) . '"><strong>' . esc_html( $performer_name ) . '</strong></a>';
										} else {
											$performer_links[] = '<strong>' . esc_html( $performer_name ) . '</strong>';
										}
									}

									$performer_output = implode( ', ', $performer_links );
								}

								$key_output = '<strong>' . esc_html__( 'N/A', 'music-director' ) . '</strong>';
								$key_terms  = get_the_terms( get_the_ID(), 'key' );

								if ( ! empty( $key_terms ) && ! is_wp_error( $key_terms ) ) {
									$key_names = wp_list_pluck( $key_terms, 'name', 'term_id' );
									$key_links = array();

									foreach ( $key_terms as $key_term ) {
										$key_name = isset( $key_names[ $key_term->term_id ] ) ? $key_names[ $key_term->term_id ] : $key_term->name;
										$key_link = get_term_link( $key_term, 'key' );

										if ( ! is_wp_error( $key_link ) ) {
											$key_links[] = '<a href="' . esc_url( $key_link ) . '"><strong>' . esc_html( $key_name ) . '</strong></a>';
										} else {
											$key_links[] = '<strong>' . esc_html( $key_name ) . '</strong>';
										}
									}

									$key_output = implode( ', ', $key_links );
								}

								$tempo_output = esc_html__( 'N/A', 'music-director' );
								$tempo_terms  = get_the_terms( get_the_ID(), 'tempo' );

								if ( ! empty( $tempo_terms ) && ! is_wp_error( $tempo_terms ) ) {
									$tempo_names = wp_list_pluck( $tempo_terms, 'name', 'term_id' );
									$tempo_links = array();

									foreach ( $tempo_terms as $tempo_term ) {
										$tempo_name = isset( $tempo_names[ $tempo_term->term_id ] ) ? $tempo_names[ $tempo_term->term_id ] : $tempo_term->name;
										$tempo_link = get_term_link( $tempo_term, 'tempo' );

										if ( ! is_wp_error( $tempo_link ) ) {
											$tempo_links[] = '<a href="' . esc_url( $tempo_link ) . '">' . esc_html( $tempo_name ) . '</a>';
										} else {
											$tempo_links[] = esc_html( $tempo_name );
										}
									}

									$tempo_output = implode( ', ', $tempo_links );
								}

								$theme_output = esc_html__( 'N/A', 'music-director' );
								$theme_terms  = get_the_terms( get_the_ID(), 'themes' );

								if ( ! empty( $theme_terms ) && ! is_wp_error( $theme_terms ) ) {
									$theme_names = wp_list_pluck( $theme_terms, 'name', 'term_id' );
									$theme_links = array();

									foreach ( $theme_terms as $theme_term ) {
										$theme_name = isset( $theme_names[ $theme_term->term_id ] ) ? $theme_names[ $theme_term->term_id ] : $theme_term->name;
										$theme_link = get_term_link( $theme_term, 'themes' );

										if ( ! is_wp_error( $theme_link ) ) {
											$theme_links[] = '<a href="' . esc_url( $theme_link ) . '">' . esc_html( $theme_name ) . '</a>';
										} else {
											$theme_links[] = esc_html( $theme_name );
										}
									}

									$theme_output = implode( ', ', $theme_links );
								}
							?>
							<?php echo $performer_output; ?> • <strong>Key</strong> (<?php echo $key_output; ?>)
							<br/>
							<strong>Tempo:</strong> <?php echo $tempo_output; ?> •<strong>Theme:</strong> <?php echo $theme_output; ?>
							
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
