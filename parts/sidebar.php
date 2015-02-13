<?php
    /**
     *  Sidebar Template
     */

    $sidebar_type =( !empty($sidebar_type) ) ? $sidebar_type : 'sidebar-1';
?>
<?php if ( is_active_sidebar( $sidebar_type ) ) : ?>
    <div id="sidebar" class="col-md-4 sidebar">
        <div class="row sidebar section">

            <?php if( is_page() ) { the_sub_pages(); } ?>

            <?php dynamic_sidebar( $sidebar_type ); ?>
        </div> <!-- /.row -->
    </div> <!-- /.col -->
<?php endif; ?>