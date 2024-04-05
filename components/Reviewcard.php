<?php

class Reviewcard {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function render() {
        
        $html = '<div class="card1">
        <div class="card-head d-flex">
            <div class="prod-flex">
                <div class="profile"></div>
                <div>
                    <div>' . $this->data['reviername'] . '</div>
                    
                    <div class="star-rating-pro">
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-solid fa-star" style="color: #d98e0d;"></i>
                        <i class="fa-regular fa-star" style="color: #d98e0d;"></i>
                    </div>
                </div> 
            </div>
        </div>
        <div class="card-body">
            <p class="review">
            ' . $this->data['review-descrption'] . '
            </p>
        </div>
    </div>
                ';

        return $html;
    }
}
?>