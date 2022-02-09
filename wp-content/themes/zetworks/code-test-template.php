<?php
/**
* Template Name: code test
*
* @package WordPress
*/
get_header();
$t_options = get_option('tp_opt');
?>


<main class="zw-topspace8">

<?php
 $taxonomy = 'manufacturingType'; // this is the name of the taxonomy
 $taxonomy2 = 'manufacturingTabs'; // this is the name of the taxonomy
 $term1 = get_terms($taxonomy);
 $term2 = get_terms($taxonomy2);
 foreach($term1 as $tax1){
	echo "<p> main-tabs".$tax1->name."</p>";
	}
	foreach($term2 as $tax2){
		echo "<p> sub-tabs".$tax2->name."</p>";
	}
 $args = array(
  'post_type' => 'manufacturing',
  'tax_query' => array(
      array(
        'taxonomy' => $term1[0]->taxonomy,
        'field' => 'slug',
        'terms' => wp_list_pluck($term1,'slug')
      ),    
      array(
        'taxonomy' => $term2[0]->taxonomy,
        'field' => 'slug',
        'terms' => wp_list_pluck( $term2,'slug')
      )
  	)
  );

 $my_query = new WP_Query( $args );
 if($my_query->have_posts()) :
	while ($my_query->have_posts()) : $my_query->the_post();
		echo "<p>".get_the_title()."</p>";
	endwhile;
 endif;
?>

<?php 
 $taxonomy = 'manufacturingType'; // this is the name of the taxonomy
 $taxonomy2 = 'manufacturingTabs'; // this is the name of the taxonomy
 $term1 = get_terms($taxonomy);
 $term2 = get_terms($taxonomy2);
 ?>
<?php 
 foreach($term1 as $tax1){
  echo "<p> main-tabs".$tax1->name."</p>";
  }
  foreach($term2 as $tax2){
    echo "<p> sub-tabs".$tax2->name."</p>";
  }
?>
<?php
  $args = array(
    'post_type' => 'manufacturing',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'relation'   => 'AND',
    'operator' => 'IN',
    'tax_query'  => array(
      array (
      'taxonomy' => 'manufacturingTabs',
      'field'    => 'slug',
      'terms'    => $tax1->name,
      ),                      
      array (
      'taxonomy' => 'manufacturingType',
      'field'    => 'slug',
      'terms'    => $manuType->slug,// get this term dynimic
      ),                      
    )
  );
  $team = new WP_Query($args);

?>
  <?php if($team->have_posts()) : ?>
    Sub-tabs: <?php echo $term->slug;?>
  <?php while($team->have_posts()) : $team->the_post();?>
    <pre><?php the_title(); ?></pre>
  <?php endwhile; wp_reset_query(); ?>
  <?php endif ?>

</main>
<?php get_footer(); ?>
