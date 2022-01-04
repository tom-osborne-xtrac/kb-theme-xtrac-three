<!-- ************************************ -->
<!-- ** Table  - Directory of Post Types *** -->
<!-- ************************************ -->
<?php 

$args = array(
    'publicly_queryable' => true,
    '_builtin' => false,
);

$output = 'objects';

$post_types = get_post_types($args, $output); 


?>

<table class="table_xthree">

    <thead> <!-- Header - do once -->
        <tr>
            <th>Type</th>   
            <th>Description</th>      
        </tr>
    </thead>

    <tbody> <!-- Body - each row within loop -->        
        <?php
            foreach($post_types as $post_type) { 
                if ( $post_type->label != 'Galleries' ) : ?>
                    <tr>
                        <td>
                            <i class="fas fa-folder fa-lg"></i>
                            <a href="<?php echo get_post_type_archive_link( $post_type->name ) ?>"><?php echo $post_type->label; ?></a>
                        </td>
                        <td>
                            <?php echo $post_type->description ?>
                        </td>
                    </tr> 
                <?php endif;
             } //end foreach ?>
          
    </tbody>
</table>






