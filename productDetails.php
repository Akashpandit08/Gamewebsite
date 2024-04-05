<?php
    include 'config.php';
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
    

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://dummyjson.com/products/categories',
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
        $categorys = $decodedResponse;
        
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
        <!-- side filter -->
        <div class="d-flex" style=" margin-top: 2%;">
            <div class="filter">
                <div class="filter-Categories">
                    <div class="d-flex">
                        <p style="text-transform: capitalize; width: 90%;">Categories</p>
                    </div>
                    <?php
                        foreach ($categorys as $category) {
                            // Generate checkbox HTML for each category
                            echo '<input type="checkbox" class="box" name="' . $category . '" id="' . $category . '">';
                            echo '<label class="filter-popin-label" for="' . $category . '" style="margin-left: 2%;">' . $category . '</label><br>';
                        }
                    ?>
                    <!-- <input type="checkbox" class="box"  class="box" name="" id="Indy">
                    <lable  class="filter-popin-label" for="Indy" style="margin-left: 2%;">Indy </label><br>
                    
                    <input type="checkbox" class="box"  name="categories[]" id="Adventure">
                    <lable  class="filter-popin-label" for="Adventure" style="margin-left: 2%;">Adventure</label><br>
            
                    <input type="checkbox" class="box"  name="categories[]" id="MMO">
                    <lable  class="filter-popin-label" for="MMO" style="margin-left: 3%;">MMO</label><br>
                    
                    <input type="checkbox" class="box"  name="categories[]" id="Action">
                    <lable  class="filter-popin-label" for="Action" style="margin-left: 3%;">Action</label><br>
            
                    <input type="checkbox" class="box"  name="categories[]" id="Strategy">
                    <lable  class="filter-popin-label" for="Strategy" style="margin-left: 3%;"> Strategy </label><br>
            
                    <input type="checkbox" class="box"  name="categories[]" id="Sports">
                    <lable  class="filter-popin-label" for="Sports" style="margin-left: 3%;"> Sports </label><br> -->
                </div>
                
                    
                <div class="filter-Platforms">
                        <div class="d-flex">
                                <p style="text-transform: capitalize; width: 90%;">Platforms</p>
                        </div>
                            <input type="checkbox" class="box"  name="" id="PC">
                            <lable  class="filter-popin-label" for="PC" style="margin-left: 2%;">PC </label><br>
                            
                            <input type="checkbox" class="box"  name="categories[]" id="PlayStation5">
                            <lable  class="filter-popin-label" for="PlayStation5" style="margin-left: 2%;">PlayStation </label><br>
                    
                            <input type="checkbox" class="box"  name="categories[]" id="PlayStation4">
                            <lable  class="filter-popin-label" for="PlayStation4" style="margin-left: 3%;">PlayStation </label><br>
                            
                            <input type="checkbox" class="box"  name="categories[]" id="XboxSeries">
                            <lable  class="filter-popin-label" for="XboxSeries" style="margin-left: 3%;">Xbox Series</label><br>
                    
                            <input type="checkbox" class="box"  name="categories[]" id="NintendoSwitch">
                            <lable  class="filter-popin-label" for="NintendoSwitch" style="margin-left: 3%;">Nintendo Switch</label><br>

                </div>
                <div class="filter-Type">
                        <div class="d-flex">
                                <p style="text-transform: capitalize; width: 90%;">Type</p>
                        </div>
                            <input type="checkbox" class="box"  name="" id="Paid">
                            <lable  class="filter-popin-label" for="Paid" style="margin-left: 2%;">Paid</label><br>
                            
                            <input type="checkbox" class="box"  name="categories[]" id="Free">
                            <lable  class="filter-popin-label" for="Free" style="margin-left: 2%;">Free</label><br>
                </div>

                <div class="filter-price">
                        <div class="d-flex">
                                <p style="text-transform: capitalize; width: 90%;">Price</p>
                        </div>
                    <div class="price-range">
                        <div class="d-flex">
                            <input aria-label="From price" class="form-control" id="minrange" type="number" inputmode="numeric" name=" "  min="0" max="5000" step="50" value="0" autocomplete="off">
                            <div class="input-group-append">
                                <span class="input-group-text text-subdued text-sm">-</span>
                            </div>
                            <input aria-label="To price" class="form-control" type="number" inputmode="numeric" name="" id="maxrange"  min="5000" max="10000" step="50" value="5000" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="filter-Platforms">
                    <div class="d-flex">
                        <p style="text-transform: capitalize; width: 90%;">Platforms</p>
                    </div>
                    <input type="checkbox" class="box"  name="Platforms" id="PC">
                    <lable  class="filter-popin-label" for="PC"  style="margin-left: 2%;">PC</label><br>
                    
                    <input type="checkbox" class="box"  name="Platforms" id="PlayStation5">
                    <lable  class="filter-popin-label" for="PlayStation5" style="margin-left: 2%;">PlayStation </label><br>
            
                    <input type="checkbox" class="box"  name="Platforms" id="PlayStation4">
                    <lable  class="filter-popin-label" for="PlayStation4" style="margin-left: 2%;">PlayStation</label><br>
                    
                    <input type="checkbox" class="box"  name="Platforms" id="XboxSeries">
                    <lable  class="filter-popin-label" for="XboxSeries" style="margin-left: 2%;">Xbox Series</label><br>
            
                    <input type="checkbox" class="box"  name="Platforms" id="NintendoSwitch">
                    <lable  class="filter-popin-label" for="NintendoSwitch" style="margin-left: 2%;">Nintendo Switch</label><br>

                </div>

                <div class="filter-Ratings">
                    <div class="d-flex">
                        <p style="text-transform: capitalize;">Ratings</p>
                    </div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>

                </div>

                <div>
                    <?php                       
                        $button = new Button();
                        echo $button->render("Buy now");?>
                </div>
        
            </div>
            <div class="sortby">
                <div class="search-result">
                    <h5>Search results for “Valorant”</h5>
                    <button id="btn-sort-icon" class="btn-sort" type="button">Sort by <i id="caret-up" class="fa-solid fa-caret-up"></i><i  id ="caret-down " class="fa-solid fa-caret-down"></i></button>  
                    <div id="short-caret-div" class="drop-short">
                    
                        <button class=" drop-sort-btn" type="button">Release date : Old to New</button>  
                        <button class=" drop-sort-btn" type="button">Release date : New to Old</button>  
                        <button class=" drop-sort-btn" type="button">Price : Low to High</button>  
                        <button class=" drop-sort-btn" type="button">Price : High to Low</button>  



                    </div>
                </div>

                <div class="product-page">
                    
                <?php
                       foreach ($productList as $product) {
                        // Create a carousel item for each product card
                        ?>
                        <div class="item">
                            <?php
                           
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

        </div>  
       
     
        <section>
           
           
        </section>

        <!-- new section  -->
    <section>
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
            <div class="game-detail-pro-Valorant">
                    <h2 class="game-title1">Valorant</h2>
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
    <section>
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
            <div class="game-detail-pro-Evolution">
                    <h2 class="game-title1">Evolution</h2>
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
    <section>
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
            <div class="game-detail-pro-Warlords">
                    <h2 class="game-title-pro">Battle of the Warlords</h2>
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
                        items: 2,
                        nav: false
                    },
                    600:{
                        items: 3,
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
