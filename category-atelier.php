<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore_Enfant
 */

$args = array(
    "category_name" => "Atelier",
    "posts_per_page" => 10 //afficher les 3 derniere nouvelles "posts_per_page" => "3"
   // "orderby" =>"date",
   // "order" => "ASC"
);

$query1 = new WP_Query( $args );

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<?php
        echo '<h1 class="titreSections"> '.category_description( get_category_by_slug( 'atelier' ) ). '</h1>'   ;
         
         echo '<div class="atelier">';

		 if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
			//	the_archive_title( '<h1 class="page-title">', '</h1>' );
			//	the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
                 echo '<div class="AtelierAlign">';
                $nb = 0;
                // The Loop
                while ( $query1->have_posts() ) {
                    $nb = $nb + 1;
                    echo '<div class="atelierItems">';
                        $query1->the_post();
                        echo '<p>'. $nb .'. '. get_the_title() . '</p>';
                        //the_post_thumbnail( 'thumbnail' );
                    echo '</div>';
                }
                
            //endwhile;
                wp_reset_postdata();
                echo '</div>';

		endif;
		?>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
////////////////////////////////////////////////////////



///////////////////////////////////////// Événements /////////////////////////////////////////////////////
/*
get_header();
echo '<h1 class="titreSections"> '.category_description( get_category_by_slug( 'evenements' ) ). '</h1>'   ;
         
echo '<div class="evenements">';
 
   // while ( $query3->have_posts() ) {
       // $query3->the_post();
       while ( have_posts() ) :
        the_post();
        $mois = get_the_date('m');
        $column = ($mois % 3) + 1;
        $row = get_the_date('j');
        //var_dump($column, $row);
        echo'<div class="elm_Evenement" style="grid-area:'.$row.'/'.$column.'">';
            echo '<a href='.get_permalink().'>' . get_the_title( get_post() ) . ' :'; echo get_the_date(' j m y').  '</a>';   
        echo '</div>';
       endwhile;
    // Restore original Post Data
    wp_reset_postdata();

echo '</div>';

get_footer();
?>
*/
