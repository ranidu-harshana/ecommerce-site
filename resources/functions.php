<?php
    function set_message($msg) {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        }
    }

    function display_message() {
        if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

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

    function get_category_products($id) {
        $query = "SELECT * FROM products WHERE product_category_id = " . escape($id);
        $result = query($query);
        confirm($result);
        while($row = fetch_array($result)) {
            $product = <<<DELIMETER
                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img src="{$row['product_image']}" alt="">
                        <div class="caption">
                            <h3>{$row['product_title']}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </p>
                        </div>
                    </div>
                </div>
            DELIMETER;

            echo $product;
        }
    }

    function login_user() {
        if(isset($_POST['submit'])) {
            $username = escape($_POST['username']);
            $password = escape($_POST['password']);

            $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
            $result = query($query);
            confirm($result);

            if(mysqli_num_rows($result) == 0) {
                set_message("Username or Password is incorrect");
                redirect('login.php');
            }else{
                redirect('admin');
            }
        }
    }

function new() {
    return "";
    }
?>


?>
