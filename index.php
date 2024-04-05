<?php

if(isset($_GET['url'])){
    $url = $_GET['url'];

    // Process the rewritten URL as needed
    // echo "Requested URL: " . $url;
}else{
    $url = '';
}

// echo json_encode($_GET);
// $baseUrl = "/Gamemanotask/"; // complete url on localhost was - http://localhost/Gamemanotask/

$routes = [
    '' => 'home.php',
    'index' => 'home.php',
    'home' => 'home.php',
    'all' => 'allProducts.php',
    'product' => 'productDetails.php'
];

if (array_key_exists($url, $routes)) {
    include($routes[$url]);
} else {
    var_dump($url);
    // If the route doesn't exist, return a 404 error
    http_response_code(404);
    echo "404 Page Not Found";
}