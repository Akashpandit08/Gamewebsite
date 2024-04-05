<?php
    include 'config.php';
    $componentData = [
        [
            'online' => '120 online',
            'image_src' => './assets/img/109.jpg',
            'image_alt' =>'product',
            'product_name' => 'World of Warcraft',
            'players' => '12k player',
            'genre' => ' Action',
            'adventure' => 'Adventure',
            'release_date' => '12 oct',
            'price' => '$45',
            'button_text' => 'buy now'
        ],
        [
            'online' => '120 online',
            'image_src' => './assets/img/109.jpg',
            'image_alt' =>'product',
            'product_name' => 'The Witcher',
            'players' => '12k player',
            'genre' => ' Action',
            'adventure' => 'Adventure',
            'release_date' => '12 oct',
            'price' => '$46',
            'button_text' => 'buy now'
        ],
        [
            'online' => '120 online',
            'image_src' => './assets/img/109.jpg',
            'image_alt' =>'product',
            'product_name' => 'Horizon',
            'players' => '12k player',
            'genre' => ' Action',
            'adventure' => 'Adventure',
            'release_date' => '12 oct',
            'price' => '$47',
            'button_text' => 'buy now'
        ],
        [
            'online' => '120 online',
            'image_src' => './assets/img/109.jpg',
            'image_alt' =>'product',
            'product_name' => 'Valorant',
            'players' => '12k player',
            'genre' => ' Action',
            'adventure' => 'Adventure',
            'release_date' => '12 oct',
            'price' => '$48',
            'button_text' => 'buy now'
        ],
        [
            'online' => '120 online',
            'image_src' => './assets/img/109.jpg',
            'image_alt' =>'product',
            'product_name' => 'The Witcher',
            'players' => '12k player',
            'genre' => ' Action',
            'adventure' => 'Adventure',
            'release_date' => '12 oct',
            'price' => '$49',
            'button_text' => 'buy now'
        ]        
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://dummyjson.com/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $decodedResponse = json_decode($response, true);
    $products = $decodedResponse['products'];
    $productList = [];
    
    foreach ($products as $product) {
        // Construct props for each product
        $element = [
            'product_id' => $product['id'],
            'product_name' => $product['title'],
            'description' => $product['description'],
            'price' => $APP_CURRENCY.$product['price'],
            'discount_percentage' => $product['discountPercentage'],
            'rating' => $product['rating'],
            'stock' => $product['stock'],
            'brand' => $product['brand'],
            'genre' => $product['category'],
            'image_src' => $product['thumbnail'],
            'image_alt' => $product['title'],
            'players' => '12k player',
            'images' => "",
            'button_text' => 'Buy Now',
            'online' => '120 online',
            'release_date' => '12 oct',
        ];
        
        array_push($productList, $element);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?php echo $APP_NAME;?>
        </title>

        <link rel="stylesheet" href="./assets/css/root.css">
        <link rel="stylesheet" href="./assets/css/navbar.css">
        <link rel="stylesheet" href="./assets/css/productCard.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/css/sidenavbar.css">
        <link rel="stylesheet" href="./assets/css/home.css">
        <!-- <> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Aoboshi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prosto+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prosto+One&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!-- owl-crusel -->
        <link rel="stylesheet" href="./assets/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="./assets/owlcarousel/assets/owl.theme.default.min.css">
    </head>
    <body>
    
        <?php include './inc/navbar.php'; ?>
        <!-- side navbar -->
        <div class="sidebar">
            <ul class="nav-list border-bootom">
                <li class="">
                    <a  href="" class="logo">
                        <h3 class="custom-text-logo">GQ</h3>
                    </a>
                </li>
                <li class="">
                    <a  class="side-menu-a li-sidebar"  href="">
                        <i class=" fas fa-solid fa-house"></i>
                        <span class="side-nav-item">Home</span>
                    </a>
                </li>
                <li class="li-sidebar">
                    <a  class="side-menu-a" href="">
                        <i class=" fas fa-regular fa-envelope"></i>
                        <span class="side-nav-item">Messages</span>
                    </a>
                </li>
                <li class="li-sidebar">
                    <a class="side-menu-a"  href="">
                        <i class=" fas  fa-solid fa-shop"></i>
                        <span class="side-nav-item">Game Store</span>
                    </a>
                </li>
                <li class="li-sidebar">
                    <a class="side-menu-a"  href="">
                        <i class=" fas fa-regular fa-credit-card"></i>
                        <span class="side-nav-item">Payments</span>
                    </a>
                </li>
                <li>
                    <a class="side-menu-a"  href="">
                        <i class=" fas fa-solid fa-trophy"></i>
                        <span class="side-nav-item">Leaderboard</span>
                    </a>
                </li>
            </ul>
            <ul class="nav-list ">
                <li>
                    <a class="side-menu-a"  href="#">
                    <i class=" fas fa-solid fa-gear"></i>
                        <span class="side-nav-item">Settings</span>
                    </a>
                </li>
                <li>
                    <a class="side-menu-a"  href="#">
                    <i class=" fas fa-solid fa-right-from-bracket"></i>
                        <span class="side-nav-item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <section>
            <div class="hero-section">
                <div class="section-row">
                    <div class="d-flex title">
                        <h2 class="game-title">Days Gone </h2>
                    </div>
                    <div class="releasedate">
                    <p style="padding: 1%;">RELEASE DATE: 30TH DECEMBER</p>
                    </div>
                    <div class="hero-content">
                        <p class="hero-content">
                            Players assume the role of Deacon St. John, a former bounty
                            hunter struggling to survive in a post-apocalyptic world filled
                            with zombie-like creatures called Freaks. Though players are
                            surrounded by death and danger on all sides, the world that they
                            get to explore feels as though it's truly alive, which can
                            encourage players to take risks when they probably shouldn't.
                        </p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">
                    <?php
                        $button = new Button();
                        echo $button->render("Try for free");
                    ?>
                    </div>
                    
                    <div class="opratingsystem">
                        <span>Available on :</span>
                        <span>iOS</span>
                        <span>
                            <i class="fa-brands fa-windows"></i>
                        </span>
                    </div>
                    <div class=""></div>
                </div>
                <div class="section-row">
                    <div class="">
                   <h6 class='h6'>Buy now for $40 only</h6>
                    </div>
                    <div class="d-flex">
                        <span class="dot"></span>
                        <span>40 of your friends are playing</span>
                    </div>
                </div>
               
            </div>
        </section>


        <div class="pro-container" style="width: 92%; margin-left: 8%;">
            <div class="trendging">
                <h4 class="custom-text">Most trending</h4>
                <a href="productDetails.php"><h4 class="gm-store">Got Game store<i class="fa-solid fa-arrow-right"></i></h4></a>
            </div>
            <div class="owl-carousel component-carousel">
                <?php
                    foreach ($productList as $product) {
                        // Create a carousel item for each product card
                        ?>
                        <a href="product?product_id=<?php echo $product['product_id'] ?>" class="item">
                            <?php
                            // Instantiate a Productcard component with the product data
                            $myComponent = new Productcard($product);
                            // Render the product card component
                            echo $myComponent->render();
                            ?>
                        </a>
                        <?php
                    }
                ?>
            </div>

        </div>

        <!-- new section  -->
    <section class="sectionhome">
        <div class="container">
            <div class="online-playing">
                <div class="text-end">
                    <h3 class="popin">
                        <span class="dot">

                        </span>40 of your friends are playing</h3>
                    <div class="star-rating">
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star-half" style="color: #d98e0d;"></i>
                    </div>
                </div>

            </div>
            <div class="game-detail">
                    <h2 class="game-title1">Evoulation</h2>
                    <div class="">
                        <p class="releasedate">
                            RELEASE DATE: 30TH DECEMBER</p>

                        <div class="">
                        <p class="game-details-p">
                            Players assume the role of Deacon St. John, a former bounty
                            hunter struggling to survive in a post-apocalyptic world filled
                            with zombie-like creatures called Freaks. Though players are
                            surrounded by death and danger on all sides, the world that they
                            get to explore feels as though it's truly alive, which can
                            encourage players to take risks when they probably shouldn't.
                        </p>  
                    </div>

                    <div class="d-flex">
                            <div class="">
                            <?php                       
                            $button = new Button();
                            echo $button->render("Buy now");?>
                            </div>
                            
                            <div class="opratingsystem">
                                <span>Available on :</span>
                                <span>iOS</span>
                                <span>
                                    <i class="fa-brands fa-windows"></i>
                                </span>
                            </div>
                            <div class=""></div>
                        </div>
                    <div class="section-row">
                        <div class="">
                            <h6 class='h6'>Buy now for $40 only</h6>
                        </div>
                        <div class="d-flex">
                                <span class="dot"></span>
                                <span>40 of your friends are playing</span>
                        </div>
                    </div>
        
            </div>

        </div>
    </section>
    <section class="sectionhome">
        <div class="container">
            <div class="online-playing">
                <div class="text-end">
                    <h3 class="popin">
                        <span class="dot">

                        </span>40 of your friends are playing</h3>
                    <div class="star-rating">
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star-half" style="color: #d98e0d;"></i>
                    </div>
                </div>

            </div>
            <div class="game-detail-Valorant">
                    <h2 class="game-title1">Valorant</h2>
                    <div class="">
                        <p class="releasedate">
                            RELEASE DATE: 30TH DECEMBER</p>
                    </div>
                    <div class="">
                        <p class="game-details-p">
                            Players assume the role of Deacon St. John, a former bounty
                            hunter struggling to survive in a post-apocalyptic world filled
                            with zombie-like creatures called Freaks. Though players are
                            surrounded by death and danger on all sides, the world that they
                            get to explore feels as though it's truly alive, which can
                            encourage players to take risks when they probably shouldn't.
                        </p>  
                    </div>

                    <div class="d-flex">
                            <div class="">
                                <?php                       
                                $button = new Button();
                                echo $button->render("Buy now");?>
                            </div>
                            
                            <div class="opratingsystem">
                                <span>Available on :</span>
                                <span>iOS</span>
                                <span>
                                    <i class="fa-brands fa-windows"></i>
                                </span>
                            </div>
                    </div>
                    <div class="section-row">
                        <div class="">
                            <h6 class='h6'>Buy now for $40 only</h6>
                        </div>
                        <div class="d-flex">
                                <span class="dot"></span>
                                <span>40 of your friends are playing</span>
                        </div>
                 </div>
        
            </div>

        </div>
    </section>
    <section class="sectionhome">
        <div class="container">
            <div class="online-playing">
                <div class="text-end">
                    <h3 class="popin">
                        <span class="dot">

                        </span>40 of your friends are playing</h3>
                    <div class="star-rating">
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star-half" style="color: #d98e0d;"></i>
                    </div>
                </div>

            </div>
            <div class="game-detail-Warlords">
                    <h2 class="game-title1">Warlords</h2>
                    <div class="">
                        <p class="releasedate">
                            RELEASE DATE: 30TH DECEMBER</p>

                        <div class="">
                        <p class="game-details-p">
                            Players assume the role of Deacon St. John, a former bounty
                            hunter struggling to survive in a post-apocalyptic world filled
                            with zombie-like creatures called Freaks. Though players are
                            surrounded by death and danger on all sides, the world that they
                            get to explore feels as though it's truly alive, which can
                            encourage players to take risks when they probably shouldn't.
                        </p>  
                    </div>

                    <div class="d-flex">
                            <div class="">
                            <?php                       
                            $button = new Button();
                            echo $button->render("Buy now");?>
                            </div>
                            
                            <div class="opratingsystem">
                                <span>Available on :</span>
                                <span>iOS</span>
                                <span>
                                    <i class="fa-brands fa-windows"></i>
                                </span>
                            </div>
                            <div class=""></div>
                        </div>
                    <div class="section-row">
                        <div class="">
                            <h6 class='h6'>Buy now for $40 only</h6>
                        </div>
                        <div class="d-flex">
                                <span class="dot"></span>
                                <span>40 of your friends are playing</span>
                        </div>
                    </div>
        
            </div>

        </div>
    </section>
   
        
        <?php include './inc/footer.php'; ?>
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="./assets/js/navbar.js"></script>
        <script src="./assets/js/productdetails.js"></script>

        <!-- fontawesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/fontawesome.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/solid.min.js"></script>

        <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- <script src="./assets/jquery.min.js"></script> -->
        <script src="./assets/owlcarousel/owl.carousel.min.js"></script>
        <script>
           $(document).ready(function(){
            $('.component-carousel').owlCarousel({
                loop: true,
                margin: 190,
                responsiveClass: true,
                responsive:{
                    0:{
                        items: 1,
                        nav: false
                    },
                    600:{
                        items: 1,
                        nav: false
                    },
                    1000:{
                        items: 4, 
                        nav: false
                    }
                }
            });

            $(".sidebar").hover(
                function(){
                    $('.custom-text-logo').text('GameQuest');
                },
                function(){
                    $('.custom-text-logo').text('GQ');
                }
            );

        });

        </script>
    </body>
</html>
