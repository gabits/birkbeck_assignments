<div class="nav">
    <?php
        include 'includes/pages_list.php';
        echo '<ul>';
        foreach($menu as $file => $title) {
            echo "<li><a href=$file>$title</a></li>";
        }
        echo '</ul>';
    ?>
</div>
