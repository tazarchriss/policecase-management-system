<?php
require_once '../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/OCS/sidebar.php'; ?>


 <!--main content start-->
 <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCS/index.php' ?>">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <!--carousel start-->
        <section class="panel">
              <div id="c-slide" class="carousel slide auto panel-body">
                <ol class="carousel-indicators out">
                  <li class="active" data-slide-to="0" data-target="#c-slide"></li>
                  <li class="" data-slide-to="1" data-target="#c-slide"></li>
                  <li class="" data-slide-to="2" data-target="#c-slide"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item text-center active">
                   
                   <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police1.png' ?>" alt="" height="200px" width="400px"></div>
                    
                  </div>
                  <div class="item text-center">
                   
                    <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police2.jpg' ?>" alt="" height="200px" width="400px"></div>
                  
                  </div>
                  <div class="item text-center">
                    
                    <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police4.png' ?>" alt="" height="200px" width="400px"></div>
                  
                  </div>
                  <div class="item text-center">
                    
                    <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police5.jpg' ?>" alt="" height="200px" width="400px"></div>
                   
                  </div>
                  <div class="item text-center">
              
                    <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police6.jpg' ?>" alt="" height="200px" width="400px"></div>
                   
                  </div>
                  <div class="item text-center">
                 
                    <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police7.png' ?>" alt="" height="200px" width="400px"></div>
               
                  </div>
                  <div class="item text-center">
                   
                    <div class="container"> <img src="<?php echo BASE_URL . '/assets/img/police3.png' ?>" alt="" height="200px" width="400px"></div>
                  
                  </div>
                </div>
                <a data-slide="prev" href="#c-slide" class="left carousel-control">
                                  <i class="arrow_carrot-left_alt2"></i>
                              </a>
                <a data-slide="next" href="#c-slide" class="right carousel-control">
                                  <i class="arrow_carrot-right_alt2"></i>
                              </a>
              </div>
            </section>
            <!--carousel end-->




<?php require_once ROOT_PATH . '/includes/footer.php'; ?>
