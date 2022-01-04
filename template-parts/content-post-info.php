<!-- ARCHIVE, SEARCH, FRONT PAGE OR HOME SPECIFIC -->
<?php if ( is_archive() || is_front_page() || is_home() || is_search() || is_page() ) : ?>
<!-- POST INFO -->
<span class="post-info">
    <!-- MATERIAL HANDBOOKS ISSUE NUMBER IN LOOP -->
    <?php   $gtpt = get_post_type_object( get_post_type($post) );
        
        //confidential	 or customer friendly
        if( $gtpt->name == 'material_handbook' && !$post->post_parent ) { ?>
            <strong>
                <span class="confidential">CONFIDENTIAL</span> | 
                <?php echo the_field('material_code') . ' | Issue ';
                echo the_field('document_issue') . ' | '; 
                echo the_field('material_type'); ?>
            </strong>
        <?php }elseif( $gtpt->name == 'material_handbook' && $post->post_parent ) { ?>
            <strong>
                <span class="customer-handbook">CUSTOMER FRIENDLY</span> | 
                <?php echo the_field('material_code') . ' | Issue ';
                echo the_field('document_issue') . ' | '; 
                echo the_field('material_type'); ?>
            </strong>
        <?php } ?>

        <!-- SALES TERRITORY-->		
        <?php 	$sT_terms = wp_get_object_terms( $post->ID, 'sales_territory' );
                $copy = $sT_terms;
                $count = count( $sT_terms );
        foreach( $sT_terms as $sT_term ) { ?>
            <a href="<?php $term_link = get_term_link( $sT_term ); echo $term_link; ?>"><?php echo $sT_term->name; ?></a><?php if( next($copy) || $count === 1 ){ echo ' | '; } ?>
        <?php } //end foreach ?>
        
        <!-- TECHNICAL AREA -->		
        <?php 	$sT_terms = wp_get_object_terms( $post->ID, 'technical_area' );
                $copy = $sT_terms;
        foreach( $sT_terms as $sT_term ) { ?>
            <a href="<?php $term_link = get_term_link( $sT_term ); echo $term_link; ?>"><?php echo $sT_term->name; ?></a><?php if( next($copy) ){ echo ', '; } ?>
        <?php } //end foreach ?>
    
</span><!-- post-info -->
<?php endif; //end archive or home specific ?>