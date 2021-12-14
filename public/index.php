<?php require_once("../resources/config.php") ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include(TEMPLATE_FRONT . DS . "top_nav.php") ?>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">
                    <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>
                </div>

                <div class="row">

                    <?php get_products(); ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>