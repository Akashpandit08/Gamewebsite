<?php

include './constants.php';
include './components/Productcard.php';
include './helper.php';

$apiUrl = 'https://dummyjson.com/products/category/'; // add category name at the end


$productListHTML = "";

function addProductByCategoryName($categoryName){
    global $productListHTML, $apiUrl, $APP_CURRENCY;
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiUrl.$categoryName,
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

        $myComponent = new Productcard($element);
        // Render the product card component
        $componentHTML = $myComponent->render();
        
        $productListHTML .= '<a href="product?product_id='.$element['product_id'].'" class="product-details-item">'.$componentHTML.'</a>';
    }
}

$categories = $_POST['checkedCheckboxes'];

for ($i=0; $i < count($categories) ; $i++) { 
    addProductByCategoryName($categories[$i]);
}

echo $productListHTML;