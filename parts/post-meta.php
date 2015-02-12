<?php
    /**
     *  Post Meta shown at the bottom of each blog post
     */
?>
<ol class="breadcrumb entry_footer">
    <?php wpcore_entry_meta(); ?>
    <?php edit_post_link( __( 'Edit', 'wpcore' ), '<li>', '</li>' ); ?>
</ol><!-- .entry_footer -->