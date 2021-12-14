<p class="lead">Shop Name</p>
<div class="list-group">
    <?php
        $sql = "SELECT * FROM categories";
        $result = query($sql);
        while ($row = fetch_array($result)) {
            echo '<a href="" class="list-group-item">'. $row['cat_title'] .'</a>';
        }
    ?>
</div>