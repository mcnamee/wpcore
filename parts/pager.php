<?php
    /**
     *  Pagination widget
     *  - shown when there's more than X number of items per page
     */
?>
<nav>
    <ul class="pager">
        <li><?php next_posts_link('&laquo; Older Entries') ?></li>
        <li><?php previous_posts_link('Newer Entries &raquo;') ?></li>
    </ul>
</nav>