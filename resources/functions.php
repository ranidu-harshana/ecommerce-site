<?php
    
    function redirect($location){
        header("Location: $location");
    }

    function query($sql) {
        global $connection;
        return mysqli_query($connection, $sql);
    }

    function confirm($result) {
        global $connection;
        if (!$result) {
            die("ERROR " . mysqli_error($connection));
        }
    }

    function escape($value) {
        global $connection;
        return mysqli_real_escape_string($connection, $value);
    }

    function fetch_array($result) {
        return mysqli_fetch_assoc($result);
    }

    function get_categories() {
        $query = "SELECT * FROM categories";
        $result = query($query);
        confirm($result);
        while($row = fetch_array($result)) {
            $category = <<<DELIMETER
                <a href="category.php?id={$row['cat_id']}" class="list-group-item">{$row['cat_title']}</a>
            DELIMETER;

            echo $category;
        }
    }

    function get_products() {
        $query = "SELECT * FROM products";
        $result = query($query);
        confirm($result);
        while($row = fetch_array($result)) {
            $product = <<<DELIMETER
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                        <div class="caption">
                            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                            </h4>
                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            <a class="btn btn-primary" target="_blank" href="">Add to cart</a>
                        </div>
                    </div>
                </div>
            DELIMETER;

            echo $product;
        }
    }
?>