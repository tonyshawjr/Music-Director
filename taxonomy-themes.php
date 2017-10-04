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
			<div class="col span_12">
				<div class="col span_4"><a href="<?php the_permalink(); ?>"><strong><?php echo $p->post_title; ?></strong></a></div>
				<div class="col span_2">
					<?php $terms = get_the_terms( $post->ID , 'key' ); 
					    foreach ( $terms as $term ) {
					        $term_link = get_term_link( $term, 'key' );
					        if( is_wp_error( $term_link ) )
					        continue;
					    echo '<a href="' . $term_link . '">' . $term->name . '</a>' . ', ';
					    } 
					    $output = ob_get_clean(); echo rtrim($output, ', ');
					?>
				</div>
				<div class="col span_6">
					<?php $terms = get_the_terms( $post->ID , 'themes' ); 
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
