<!-- ************************************ -->
<!-- ** Table of latest content added *** -->
<!-- ************************************ -->
<table class="table_xthree">

    <thead> <!-- Header - do once -->
        <tr>
            <th>Type</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Project</th>              
            <th>Author / Date</th>              
        </tr>
    </thead>

    <tbody> <!-- Body - each row within loop -->

    <?php 
    if ( have_posts() ) :

    /* Start the loop */
    while ( have_posts() ) :
        the_post();
    ?>
    <tr data-href="<?php echo esc_url( get_permalink() ); ?>">
        
        <?php 
        // Icon selection - set the icon based on the content of the row
        // XT-reports = fa-file
        // Material Handbook = fa-book
        // HT Code = fa-clipboard-list
        // Post = fa-sticky-note
        // Guide = fa-graduation-cap
        // Snippet = fa-comment-dots

        $gtpt = get_post_type_object ( get_post_type ( $post ) );

        if ( $gtpt->name == 'xt_report' ) {
            $fa_icon = "far fa-file-alt";
            $fa_icon_colour = "#00504e"; // Xtrac Green

        } elseif ( $gtpt->name == 'material_handbook' ) {
            $fa_icon = "fas fa-book";
            $fa_icon_colour = "#F76C5E"; // Bitersweet (red)

        } elseif ( $gtpt->name == 'ht_code' ) {
            $fa_icon = "fas fa-clipboard-list";
            $fa_icon_colour = "#324376"; // Deep Koamaru (navy)

        } elseif ( $gtpt->name == 'post' ) {
            $fa_icon = "fas fa-sticky-note";
            $fa_icon_colour = "#449DD1"; // Celestial Blue

        } elseif ( $gtpt->name == 'guides' ) {
            $fa_icon = "fas fa-graduation-cap";
            $fa_icon_colour = "#09BC8A"; // Carribean Green

        } elseif ( $gtpt->name == 'snippet' ) {
            $fa_icon = "fas fa-comment-dots";
            $fa_icon_colour = "#FFBF00 "; // Flourescnent Orange

        } else {
            $fa_icon = "exclamation-circle";
        }

        ?>
        
        <td id="home_table__type">
            <i class="<?php echo $fa_icon; ?> fa-lg" style="color: <?php echo $fa_icon_colour; ?>;" alt="<?php echo $gtpt->labels->singular_name; ?>" title="<?php echo $gtpt->labels->singular_name; ?>"></i>
            <!--<?php // echo $gtpt->labels->singular_name; ?>-->
        </td><!-- Type column -->

                            <td id="home_table__title">
            <?php the_title( '<span class="entry-title"><a href="' . esc_url( get_permalink() ) . '"  class="row_link" rel="bookmark">', '</a></span>' ); ?>
            
            <!-- POST INFO -->
            <?php get_template_part( 'template-parts/content', 'post-info' ); ?>            

            <!-- EXCERPT -->
            <span class="excerpt"><?php $excerpt = get_the_excerpt(); echo $excerpt; ?></span>
        </td>

        <td id="home_table__category">
            <?php 
            $categories = get_the_category( $post->ID ); 
            $copy = $categories;
                foreach( $categories as $category ) { 
                    $category_link = get_category_link( $category ); 
            ?>
                    <a href="<?php echo $category_link; ?>"><?php echo $category->name; if( next($copy) ) { echo ', <br />'; } ?></a> 
            <?php
                }  // end foreach
            ?>        
        </td><!-- category column -->

        <td id="home_table__project">
            <?php 
            $terms_projectcode = get_the_terms( $post->ID , 'project_code' ); 
            $copy = $terms_projectcode;
                foreach( $terms_projectcode as $projectcode ) { 
                    $term_link = get_term_link( $projectcode ); 
            ?>
                    <a href="<?php echo $term_link; ?>"><?php echo $projectcode->name; if( next($copy) ) { echo ', <br />'; } ?></a> 
            <?php
                }  // end foreach
            ?>
        </td><!-- project column -->

        <!-- <td id="home_table__author">
            <?php echo get_the_author(); ?>
        </td>
         -->
        <td id="home_table__date" class="table_xthree__date">
            <?php the_time( get_option( 'date_format' ) ); ?>
            <br />
            <?php echo get_the_author(); ?>
        </td>
    </tr>

    <?php
    endwhile;

    else :
    ?>
        <tr>
            <td colspan="5">Nothing to see here!</td>
        </tr>
    <?php    
    endif;
    ?>
    </tbody>

</table>
<?php wp_reset_query(); ?>