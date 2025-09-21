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
                        $theme_terms = get_terms(
                                array(
                                        'taxonomy'   => 'themes',
                                        'orderby'    => 'name',
                                        'order'      => 'ASC',
                                        'hide_empty' => true,
                                )
                        );

                        if ( ! is_wp_error( $theme_terms ) && ! empty( $theme_terms ) ) :
                                foreach ( $theme_terms as $theme_term ) :
                                        $songs_query = new WP_Query(
                                                array(
                                                        'post_type'      => 'songs',
                                                        'post_status'    => 'publish',
                                                        'posts_per_page' => -1,
                                                        'orderby'        => 'title',
                                                        'order'          => 'ASC',
                                                        'tax_query'      => array(
                                                                array(
                                                                        'taxonomy' => 'themes',
                                                                        'field'    => 'term_id',
                                                                        'terms'    => $theme_term->term_id,
                                                                ),
                                                        ),
                                                )
                                        );

                                        if ( $songs_query->have_posts() ) :
                                                while ( $songs_query->have_posts() ) :
                                                        $songs_query->the_post();
                                                        $song_id = get_the_ID();
                                                        ?>
                        <div class="col span_12">
                                <div class="col span_4"><a href="<?php echo esc_url( get_permalink( $song_id ) ); ?>"><strong><?php echo esc_html( get_the_title( $song_id ) ); ?></strong></a></div>
                                <div class="col span_2">
                                        <?php echo wp_kses_post( music_director_get_formatted_term_links( $song_id, 'key' ) ); ?>
                                </div>
                                <div class="col span_6">
                                        <?php echo wp_kses_post( music_director_get_formatted_term_links( $song_id, 'themes' ) ); ?>
                                </div>
                        </div>
                                                        <?php
                                                endwhile;
                                                wp_reset_postdata();
                                        endif;
                                endforeach;
                        endif;
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
