<?php require_once("../resources/config.php");?>

<?php include(TEMPLATE_FRONT .DS. "header.php");?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

           <!--CATEGORY-->
            
        
            
            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
            
                        
            <!--carel-->

                    </div>

                </div>

                <div class="row">
         
        <!--Getting the prduct price from the DB using functions-->
                    <?php get_products();?>
            
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT .DS. "footer.php");?>
    