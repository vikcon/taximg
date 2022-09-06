/*show category image on product */
function vikcon_showterms() {
          
  // load all 'taxonomy' terms for the post
  $terms = get_the_terms( $post->ID, 'ingredients' );
  // we will use the first term to load ACF data from
  if( !empty($terms) ) {
      foreach ( $terms as $term ) {
        $termname = $term->name; 

    $imagelink = get_field('image', $term->taxonomy . '_' . $term->term_id);
	$posttitle = get_the_title( $post );
	echo '<h2><img class="taximg" src="'. $imagelink .'" alt="' . $termname . '"/>'. $termname . '</h2>'  ;
	}
      
  }
  else { echo 'terms empty'; }
}
add_shortcode('vikcon_showcat', 'vikcon_showterms');
