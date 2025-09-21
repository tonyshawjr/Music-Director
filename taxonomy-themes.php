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
		<div class="col span_8">
			<div class="col span_12">
				<div class="col span_4"><strong>Song:</strong></div>
				<div class="col span_2"><strong>Key:</strong></div>
				<div class="col span_6"><strong>Theme:</strong></div>
			</div>
			<?php
             global $post;
             $cargs = array(
                 'child_of'      => 0,
                 'orderby'       => 'name',
                 'order'         => 'ASC',
                 'hide_empty'    => 1,
                 'taxonomy'      => 'themes', //change this to any taxonomy
             );
             foreach (get_categories($cargs) as $tax) :
                 // List posts by the terms for a custom taxonomy of any post type
                 $args = array(
                     'post_type'         => 'songs',
                     'post_status'       => 'publish',
                     'posts_per_page'    => -1,
                     'orderby'           => 'title',
                     'order'             => 'ASC',
                     'meta_key'          => '',
                     'meta_value'        => '',
                     'tax_query' => array(
                         array(
                             'taxonomy'  => 'themes',
                             'field'     => 'slug',
                             'terms'     => $tax->slug
                         )
                     )
                 );
                 if (get_posts($args)) :
             ?>
			 
			 <?php foreach(get_posts($args) as $p) : ?>
			<?php
			$song_id      = $p->ID;
			$key_output   = esc_html__( 'N/A', 'music-director' );
			$theme_output = esc_html__( 'N/A', 'music-director' );

			$key_terms = get_the_terms( $song_id, 'key' );
			if ( ! empty( $key_terms ) && ! is_wp_error( $key_terms ) ) {
				$key_names = wp_list_pluck( $key_terms, 'name', 'term_id' );
				$key_links = array();

				foreach ( $key_terms as $key_term ) {
					$key_name = isset( $key_names[ $key_term->term_id ] ) ? $key_names[ $key_term->term_id ] : $key_term->name;
					$key_link = get_term_link( $key_term, 'key' );

					if ( ! is_wp_error( $key_link ) ) {
						$key_links[] = '<a href="' . esc_url( $key_link ) . '">' . esc_html( $key_name ) . '</a>';
					} else {
						$key_links[] = esc_html( $key_name );
					}
				}

				$key_output = implode( ', ', $key_links );
			}

			$theme_terms = get_the_terms( $song_id, 'themes' );
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
			<div class="col span_12">
				<div class="col span_4"><a href="<?php echo esc_url( get_permalink( $p ) ); ?>"><strong><?php echo esc_html( $p->post_title ); ?></strong></a></div>
				<div class="col span_2">
					<?php echo $key_output; ?>
				</div>
				<div class="col span_6">
					<?php echo $theme_output; ?>
				</div>
			</div>
				
			
			<?php endforeach; ?>
			
			<?php
	            endif;
	            endforeach;
	         ?>
			
		</div>
		<div class="col span_4 song-side-bar">
			<h3>Filter</h3>
		</div>
	</div>
	</div>
			   

	</div><!--/container-->

</div><!--/container-wrap-->

<?php get_footer(); ?>
