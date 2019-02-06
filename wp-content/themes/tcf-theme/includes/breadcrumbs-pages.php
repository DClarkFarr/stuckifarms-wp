<section class="section-sm live-here-breadcrumbs bg-theme">
    <div class="container">
        <div class="breadcrumbs">
        <?php 
        foreach($pages as $page){
            echo "<div>";
                echo "<a class='". (!empty($active) && $page->ID == $active->ID ? 'active' : '') ." link-white' href='". get_permalink($page->ID) ."'>";
                    echo get_the_title($page->ID);
                echo "</a>";
            echo "</div>";
        }
        ?>
        </div>
    </div>
</section>