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
?>