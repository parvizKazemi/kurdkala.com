<?php
session_start();
require_once "../DBEntities/GroupService.php";
require_once "../DBEntities/DetailNameService.php";
require_once "../DBEntities/GroupDetailService.php";
require_once "../utilities/TableNames.php";

$group=new GroupService(\utilities\TableNames::$Group);
$groups=$group->getByProperties(array());


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KURD-KALA</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../engine1/style.css" />
    <script type="text/javascript" src="../engine1/jquery.js"></script>

  

</head>
<body>
<header id="header"><!--header-->
    
<div class="header_top"><!--header_top-->


        <div class="row" style="background-color:#585656">
       
            <dvi class="col-sm-4">
               <ul class="nav nav-pills pull-right" >
                            <li><a href="#" style="color:white"><i class="fa fa-phone" ></i> +989188721076</a></li>
                            <li><a href="#" style="color:white"><i class="fa fa-envelope"></i> Moeidheidari@hotmail.com</a></li>

                            </ul>

            </dvi>
              
              
        <div class="col-sm-2">
         <ul class="nav nav-pills pull-right" >
             <li><a href="#" style="color:white">  خوش آمدید    </a>

<li><a href="#" style="color:white">  سلام ! ناشناس  <i class="fa fa-user" ></i></a>

         </ul>

        </div>
        
        <div class="col-sm-3 col-md-3 ">

        </div>
        <div class="col-sm-2" >
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">

                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>






                        </ul>
                    </div>
                </div>
             
           

            </div>
            

            
        </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row" >
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="../images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-left">
                            <div class="btn-group" style="margin-top: 5px">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    زبان
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">ENG</a></li>
                                    <li><a href="#">FA</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse" >


                                <li><a href="../ShopingTutorial.html" c>راهنمای خرید</a></li>


                                <li><a href="404.html">درباره ما</a></li>
                                <li><a href="contact-us.html">ارتباط با ما</a></li>

                                <li class="dropdown"><a href="#">خرید<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">کالاها</a></li>
                                        <li><a href="../product-details.html">جزیزات کالاها</a></li>
                                        <li><a href="../checkout.html">سفارش کالا</a></li>
                                        <li><a href="../checkout.html">خرید عمده ا</a></li>
                                    </ul>

                                </li>
                                <li><a href="index.php" class="active" >خانه</a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-user"></i> حساب</a></li>



                                <li><a href="login.html"><i class="fa fa-lock"></i> ورود</a></li>
                            </ul>
                            <a href="../cart.html" type="button" class="btn btn-success btn-lg" style="margin-left: 20px" >
                                <span class="glyphicon glyphicon-shopping-cart"></span> سبد خرید
                                <span class="badge badge-notify">3</span>

                            </a>


                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-1 col-md-4 ">
                </div>
            <div class="col-sm-1 col-md-4 " style="margin-top: 25px">
                <form class="navbar-form" role="search" >
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="جستجوی کالا . . ." name="q" dir="rtl">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!--/header-middle-->


        <div class="header-bottom" ><!--header-bottom-->
        <div class="container">
            <div class="row" >
                <div class="col-sm-9" >
                    <div class="navbar-header" >
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-right" >

                    </div>
                </div>

            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->
<section id="slider"><!--slider-->
    <div class="container" >


        <div class="row">

            <div class="col-sm-12">

   <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
    <div id="wowslider-container1">
    <div class="ws_images"><ul>
        <li><a href="http://wowslider.com"><img src="../data1/images/edge.png" alt="bootstrap slider" title="edge" id="wows1_0"/></a></li>
        <li><img src="../data1/images/banner1.jpg" alt="banner1" title="banner1" id="wows1_1"/></li>
        <li><a href="http://wowslider.com"><img src="../data1/images/banner2.png" alt="bootstrap slider" title="edge" id="wows1_0"/></a></li>
        <li><img src="../data1/images/banner3.png" alt="banner1" title="banner1" id="wows1_1"/></li>
    </ul></div>
    <div class="ws_bullets"><div>
        <a href="#" title="edge"><span><img src="../data1/tooltips/edge.png" alt="edge"/>1</span></a>
        <a href="#" title="banner1"><span><img src="../data1/tooltips/banner1.jpg" alt="banner1"/>2</span></a>
        <a href="#" title="edge"><span><img src="data1/tooltips/banner2.png" alt="edge"/>3</span></a>
        <a href="#" title="banner1"><span><img src="data1/tooltips/banner3.png" alt="banner1"/>4</span></a>
    </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">wow slider</a> by WOWSlider.com v8.7</div>
    <div class="ws_shadow"></div>
    </div>  
   
    <!-- End WOWSlider.com BODY section -->



            </div>

        </div>



    </div>
</section><!--/slider-->
<section>
    <div class="container" dir="rtl">
        <div class="row">
            <div class="col-sm-3 " pull-right>

                <div class="left-sidebar">
                    <h2>گروه ها</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
<?php
                        foreach($groups as $gp1)
                        {
                            $currentParentId=$gp1->getId();
                        if($gp1->getParentId()==0) {
                            echo '<div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#item' . $gp1->getId() . '">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        ' . $gp1->getName() . '
                                    </a>
                                </h4>
                            </div>
                            <div id="item' . $gp1->getId() . '" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>';


                            foreach ($groups as $gp2) {
                                if ($gp2->getParentId() == $currentParentId) {
                                    echo '<li><a href="#">' . $gp2->getName() . '</a></li>';
                                }
                            }
                            echo '
                                    </ul>
                                </div>
                            </div>
                        </div>';
                        }
                        }
?>
                        </div>


<!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>برند ها</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-left">(50)</span>اپل</a></li>
                                <li><a href="#"> <span class="pull-left">(56)</span>مایکروسافت</a></li>
                                <li><a href="#"> <span class="pull-left">(27)</span>ال جی</a></li>
                                <li><a href="#"> <span class="pull-left">(32)</span>سامسونگ</a></li>
                                <li><a href="#"> <span class="pull-left">(5)</span>سونی</a></li>

                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>محدوده قیمت</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">تومان 0</b> <b class="pull-right">تومان 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="../images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="../images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-left">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">کالا های انتخاب شده</h2>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/home/product1.jpg" alt="" />
                                    <h2>20000 تومان</h2>
                                    <p>مانتو</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>20000 تومان</h2>
                                        <p>مانتو</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/home/product2.jpg" alt="" />
                                    <h2>115000 تومان</h2>
                                    <p>عینک</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>115000 تومان</h2>
                                        <p>عینک</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/home/product3.jpg" alt="" />
                                    <h2>45000 تومتن</h2>
                                    <p>لباس زنانه</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>45000 تومتن</h2>
                                        <p>لباس زنانه</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div><!--features_items-->

                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">کالا های محبوب</h2>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/home/product1.jpg" alt="" />
                                    <h2>20000 تومان</h2>
                                    <p>مانتو</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>20000 تومان</h2>
                                        <p>مانتو</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/home/product2.jpg" alt="" />
                                    <h2>115000 تومان</h2>
                                    <p>عینک</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>115000 تومان</h2>
                                        <p>عینک</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/home/product3.jpg" alt="" />
                                    <h2>45000 تومتن</h2>
                                    <p>لباس زنانه</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>45000 تومتن</h2>
                                        <p>لباس زنانه</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div><!--features_items-->

                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                            <li><a href="#kids" data-toggle="tab">Kids</a></li>
                            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery2.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery3.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery4.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="blazers" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery4.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery3.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery2.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sunglass" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery3.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery4.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery2.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kids" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery2.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery3.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery4.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="poloshirt" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery2.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery4.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery3.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">کالا های پیشنهاد شده</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>خرید</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>


</section>
<footer id="footer"><!--Footer-->
    <div class="footer-top">

    </div>

    <div class="footer-widget">
        <div class="container">

            <div class="row">

                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>KURD</span>-KALA</h2>
                        <p dir="rtl">با کرد کالا میتوانید در هر جایی که هستید کالای خود را انتخاب،سفارش و تحویل بگیرید</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="address">
                        <img src="../images/home/map.png" alt="" />
                        <p>سنندج - میدان اقبال - فروشگاه آینده سازان</p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Company Information</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Store Location</a></li>
                            <li><a href="">Affillate Program</a></li>
                            <li><a href="">Copyright</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="footer-widget">
        <div class="container">

            <div class="row">


                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>قوانین</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">قوانین استفاده</a></li>
                            <li><a href="">سیاست حفظ حریم </a></li>
                            <li><a href="">سیاست استرداد</a></li>
                            <li><a href="">Billing System</a></li>
                            <li><a href="">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Company Information</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Store Location</a></li>
                            <li><a href="">Affillate Program</a></li>
                            <li><a href="">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1" dir="rtl">
                    <div class="single-widget">
                        <h2>از اخبار فروشگاه مطلع شوید</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="ایمیل خود را وارد کنید" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                <p class="pull-right">Designed by <span>Moeid heidari</span></p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.scrollUp.min.js"></script>
<script src="../js/price-range.js"></script>
<script src="../js/jquery.prettyPhoto.js"></script>
<script src="../js/main.js"></script>
<script type="text/javascript" src="../engine1/wowslider.js"></script>
<script type="text/javascript" src="../engine1/script.js"></script>

<script>


</script>




</body>
</html>