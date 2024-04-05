<?php
    include 'config.php';
    $reviewCard = [
        [
            'reviername' => 'John Doe',
            'review-descrption' => 'Suspendisse tristique
            cursus viverra eu ac ac arcu integer. 
            Et dolor aliquam nisi lacinia commodo 
            facilisis tortor lobortis malesuada.
             Id nibh nisl convallis odio dui',
        ],
        [
            'reviername' => 'John Doe',
            'review-descrption' => 'Suspendisse tristique
            cursus viverra eu ac ac arcu integer. 
            Et dolor aliquam nisi lacinia commodo 
            facilisis tortor lobortis malesuada.
             Id nibh nisl convallis odio dui',
        ],
        [
            'reviername' => 'John Doe',
            'review-descrption' => 'Suspendisse tristique
            cursus viverra eu ac ac arcu integer. 
            Et dolor aliquam nisi lacinia commodo 
            facilisis tortor lobortis malesuada.
             Id nibh nisl convallis odio dui',
        ],
        [
            'reviername' => 'John Doe',
            'review-descrption' => 'Suspendisse tristique
            cursus viverra eu ac ac arcu integer. 
            Et dolor aliquam nisi lacinia commodo 
            facilisis tortor lobortis malesuada.
             Id nibh nisl convallis odio dui',
        ],
        [
            'reviername' => 'John Doe',
            'review-descrption' => 'Suspendisse tristique
            cursus viverra eu ac ac arcu integer. 
            Et dolor aliquam nisi lacinia commodo 
            facilisis tortor lobortis malesuada.
             Id nibh nisl convallis odio dui',
        ],
        [
            'reviername' => 'John Akash',
            'review-descrption' => 'Suspendisse tristique
            cursus viverra eu ac ac arcu integer. 
            Et dolor aliquam nisi lacinia commodo 
            facilisis tortor lobortis malesuada.
             Id nibh nisl convallis odio dui',
        ]
        ];
       
        // fetching product list
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

        // fetching product details by id
        $product_id = $_GET['product_id'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dummyjson.com/products/'.$product_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $responseProductDetailsString = curl_exec($curl);
        
        curl_close($curl);

        $responseProductDetails = json_decode($responseProductDetailsString, true);
        
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
        <link rel="stylesheet" href="./assets/css/productdetails.css">
        <link rel="stylesheet" href="./assets/css/product.css">
        <!-- <> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Aoboshi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prosto+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prosto+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Aoboshi+One&display=swap" rel="stylesheet">


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
        <div class= "side-line">

        </div>
    <div class="container">
        <!-- <div class="corner"></div> -->
        <div  class="conercut">
            <div class="product-detail-div">
                <div class="release">
                <div class="release-pro">
                    <p class="releasedatepro">
                                    RELEASE DATE: 30TH DECEMBER 
                    </p>
                    </div class="leauge">
                    <div class="star-rating-pro">
                                <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                                <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                                <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                                <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                                <i class="fa-solid fa-star-half" style="color: #d98e0d;"></i>
                    </div>
                    </div>
                <div class="leauge">
                    <div>
                            <h1 class="product-name"><?php echo $responseProductDetails['title'] ?></h1>
                            <!-- <h1 class="product-name1">LEGENDS<h1> -->
                    </div>
                    <div class="">
                            <?php                       
                            $button = new Button();
                            echo $button->render("Try For Free");?>
                            </div>
                    <div class="pro-online">
                                <span class="dot"></span>
                                <span class="enroll">245k players already enrolled</span>
                    </div>
                </div>

                <div class="opratingsystempro">
                    <span>Available on :</span>
                    <span>
                        <i class="fa-brands fa-windows"></i>
                    </span>
                    <span>iOS</span>
                </div>

            </div>

        

            
        </div>
        

    </div>
    <section class="section1">
        <div class="pro-info">
            <p clas="pro-details-p">
                Wild Rift! Built from the ground up for mobile-first PvP,
                 Wild Rift is a 5v5 multiplayer online battle arena (MOBA) game with exciting action where your skills, strategy,
                  and combat senses are put to the test. Wild Rift is packed with content and fresh features for the ultimate PvP multiplayer experience.
            </p> 

               
            <p clas="pro-details-p">

                Enjoy fast-paced MOBA combat, real-time strategy, smooth controls, and diverse 5v5 gameplay. 
                Team up with friends, lock in your champion, and play to win!
           </p>
            <div>
                <h5 class="cham-upper-heading">
                Choose your
                </h5>
                <h4 class="champ-heading">CHAMPION</h4>

            </div>
            <p clas="pro-details-p">
            Whether you like to dive straight into the fray, support your teammates, or something in between, there’s a spot for you on the Rift.
            </p>
        </div>

    </section>
    <section class="game-section">
        <div class="player-game">
            <div  class="game-div">
                <h1 class="gamer-name">
                 Akali 
                </h1>
                <h3 class="game-play">The Rogue Assassin</h3>
                <div class="play-now">
                            <?php                       
                            $button = new Button();
                            echo $button->render("Play Now");?>
                            </div>
            </div>
            <div  class="game-div">

            </div>

            
        </div>
        <div class="player-game">
             <div  class="game-div"></div>
            <div  class="game-div">
                <h1 class="gamer-name">
                Thresh 
                </h1>
                <h3 class="game-play">The Chain Warden</h3>
                <div class="play-now">
                    <?php                       
                    $button = new Button();
                    echo $button->render("Play Now");?>
                </div>
            </div>
          
        </div>
        <div class="player-game">
            <div  class="game-div">
                <h1 class="gamer-name">
                Jinx 
                </h1>
                <h3 class="game-play">The Loose Cannon</h3>
                <div class="play-now">
                            <?php                       
                            $button = new Button();
                            echo $button->render("Play Now");?>
                            </div>
            </div>
            <div  class="game-div">

            </div>

            
        </div>
        <div class="player-game">
             <div  class="game-div"></div>
            <div  class="game-div">
                <h1 class="gamer-name">
                Yasuo 
                </h1>
                <h3 class="game-play">The Unforgiven</h3>
                <div class="play-now">
                    <?php                       
                    $button = new Button();
                    echo $button->render("Play Now");?>
                </div>
            </div>
          
        </div>

    </section>
    <section class="section1">
        <div class="pro-container"style="width: 92%; margin-left: 8%;">
                <div class="trendging">
                    <h4 class="top-review">Reviews from other top players</h4>
                    <a href="productDetails.php"><h4 class="gm-store">View All<i class="fa-solid fa-arrow-right"></i></h4></a>
                </div>
                <div class="owl-carousel reviewCard-carousel">
                        <?php
                        for ($i=0; $i < count($reviewCard) ; $i++) { 
                            $myComponent = new Reviewcard($reviewCard[$i]);
                            // Render the component
                            ?>
                            <div>
                            <?php
                                echo $myComponent->render();
                            ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>  
            </div>
       
    </section>

    <!-- start your legend  -->
    <section>
        
        <div class="container">
          <div class="start-row">
            <div class="con-div">
                <div  class="conercut">
                        <div class="product-detail-div1">
                        </div>
                </div>
            </div>
            <div class="game-detail1">
                <h5 class="start-le">Start your </h5>
             <h2 class="game-titel-le">Evolution</h2>
             <div class="details-p">
            <p class="game-details-p">
                Ac odio sodales mi leo vitae dui nibh turpis aliquet.
                Porttitor aenean egestas cras mauris at. 
                Mi nisl turpis sodales aliquet. Quis risus lorem enim magna nisl.
            </p>  
            <p class="game-details-p">
                Nibh vitae morbi urna sapien mattis dolor dictum massa id. Eget arcu nulla dolor nisi.
                Facilisis risus lectus odio enim ut tortor facilisi neque nibh.
            </p>
            <div class="d-flex btn-div">
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
           
                <!-- <div class="game-detail-pro-Evolution">
                        <h2 class="game-title1">Evolution</h2>
                        <div class="">
                            <p class="releasedate">
                                RELEASE DATE: 30TH DECEMBER</p>
                        </div>
                        <div class="">
                            <p class="game-details-p">
                               Ac odio sodales mi leo vitae dui nibh turpis aliquet.
                                Porttitor aenean egestas cras mauris at. 
                               Mi nisl turpis sodales aliquet. Quis risus lorem enim magna nisl.
                            </p>  
                        </div>

                         -->
            
                </div>
            </div>
        </div>
    </section>
    <!-- game-recomndatin  -->
    <section class="section1">
        <div class="pro-container ">
                <div class="trendging">
                    <h4 class="top-review">Games recommended for you</h4>
                    <a href="productDetails.php"><h4 class="gm-store">View All<i class="fa-solid fa-arrow-right"></i></h4></a>
                </div>
                <div class="owl-carousel recommended-carousel">
                <?php
                    foreach ($productList as $product) {
                        // Create a carousel item for each product card
                        ?>
                        <div class="item">
                            <?php
                            // Instantiate a Productcard component with the product data
                            $myComponent = new Productcard($product);
                            // Render the product card component
                            echo $myComponent->render();
                            ?>
                        </div>
                        <?php
                    }
                ?>
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
            $('.reviewCard-carousel').owlCarousel({
                loop: true,
                margin: 100,
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
                        nav: true,
                        loop: false
                    }
                }
            });
            $('.recommended-carousel').owlCarousel({
                loop: true,
                margin: 100,
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
                        nav: true,
                        loop: false
                    }
                }
            });
        });

        </script>
    </body>
</html>
