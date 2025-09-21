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
					<?php
					$performer_id = get_the_ID();
					$key_output   = '<strong>' . esc_html__( 'N/A', 'music-director' ) . '</strong>';
					$tempo_output = esc_html__( 'N/A', 'music-director' );

					$key_terms = get_the_terms( $performer_id, 'key' );
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

					$tempo_terms = get_the_terms( $performer_id, 'tempo' );
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
					?>
					<div class="song-details">
						<div class="move-left">
							<small><strong>Key:</strong> <?php echo $key_output; ?></small> 
						</div>
						<div class="move-right">
							<small><strong>Tempo:</strong> <?php echo $tempo_output; ?></small>
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
